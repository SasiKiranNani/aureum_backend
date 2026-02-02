<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserRegistered;
use App\Mail\ResetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'original_password' => $request->password, // Storing original password if needed
        ]);

        // Assign default role from Filament Shield
        $user->assignRole('user');

        // Log the user in
        Auth::login($user);

        // Send Welcome Email
        try {
            \Log::info('Attempting to send welcome email to: ' . $user->email);
            Mail::to($user->email)->send(new UserRegistered($user));
            \Log::info('Welcome email sent successfully to: ' . $user->email);
        } catch (\Exception $e) {
            // Log error but don't stop the registration process
            \Log::error('Registration Email Error: ' . $e->getMessage());
        }

        session()->flash('success', 'Registration successful! Welcome to ORIONSM.');

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => route('home')
        ]);
    }

    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();

            session()->flash('success', 'Welcome back! You have logged in successfully.');

            return response()->json([
                'success' => true,
                'message' => 'Logged in successfully!',
                'redirect' => route('home')
            ]);
        }

        return response()->json([
            'success' => false,
            'errors' => ['email' => ['The provided credentials do not match our records.']]
        ], 422);
    }

    /**
     * Handle forgot password
     */
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        \Log::info('Forgot password request for: ' . $request->email);
        
        // Find user manually for explicit check
        $user = User::where('email', $request->email)->first();

        // 1. Explicit existence check
        if (!$user) {
            \Log::warning('Forgot password attempt for non-existent email: ' . $request->email);
            return response()->json([
                'success' => false,
                'message' => 'This email address is not registered with us.'
            ], 422);
        }

        try {
            // 2. Generate reset token manually
            $token = Password::createToken($user);
            
            // 3. Create reset URL
            $resetUrl = route('password.reset', ['token' => $token, 'email' => $user->email]);

            // 4. Send Custom Private Mailable
            Mail::to($user->email)->send(new ResetPasswordMail($user, $resetUrl));

            \Log::info('Custom reset email sent to: ' . $request->email);

            return response()->json([
                'success' => true,
                'message' => 'Check your inbox! We have sent you a premium password reset link.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Forgot Password Email Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Unable to send reset link. Please try again later.'
            ], 500);
        }
    }

    /**
     * Show the password reset form
     */
    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    /**
     * Handle the password reset request
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('success', 'Your password has been reset successfully. You can now log in.');
            return response()->json([
                'success' => true,
                'message' => 'Password reset successfully!',
                'redirect' => route('home')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => __($status)
        ], 400);
    }

    /**
     * Update user profile (name only as requested)
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully!',
            'user' => $user
        ]);
    }

    /**
     * Update user password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The provided old password does not match our records.'
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully!'
        ]);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Successfully logged out. See you soon!');
    }
}
