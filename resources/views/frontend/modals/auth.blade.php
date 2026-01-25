<!-- Premium Animated Auth Modal - Sliding Container Design -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content auth-modal-content" data-lenis-prevent>
            <!-- Custom Close Button -->
            <button type="button" class="auth-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-times"></i>
            </button>

            <div class="auth-container" id="authContainer">
                <!-- Sign Up Form -->
                <div class="auth-form-container auth-signup-container">
                    <form action="#" method="POST" class="auth-form">
                        <h2 class="auth-form-title">Create Account</h2>
                        <span class="auth-form-span">Use your email for registration</span>
                        <div class="auth-input-group">
                            <i class="fa fa-user"></i>
                            <input type="text" class="auth-input" placeholder="Name" required />
                        </div>
                        <div class="auth-input-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="auth-input" placeholder="Email" required />
                        </div>
                        <div class="auth-input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="auth-input password-field" placeholder="Password" required />
                            <i class="fa fa-eye-slash toggle-password auth-toggle-icon"></i>
                        </div>
                        <div class="auth-input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="auth-input password-field" placeholder="Confirm Password"
                                required />
                            <i class="fa fa-eye-slash toggle-password auth-toggle-icon"></i>
                        </div>
                        <button type="submit" class="auth-btn">Sign Up</button>
                    </form>
                </div>

                <!-- Sign In Form -->
                <div class="auth-form-container auth-signin-container">
                    <form action="#" method="POST" class="auth-form">
                        <h2 class="auth-form-title">Sign In</h2>
                        <span class="auth-form-span">Use your account credentials</span>
                        <div class="auth-input-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="auth-input" placeholder="Email" required />
                        </div>
                        <div class="auth-input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="auth-input password-field" placeholder="Password" required />
                            <i class="fa fa-eye-slash toggle-password auth-toggle-icon"></i>
                        </div>
                        <a href="javascript:void(0)" class="auth-forgot-link" id="showForgotPassword">Forgot your
                            password?</a>
                        <button type="submit" class="auth-btn">Sign In</button>
                    </form>
                </div>

                <!-- Forgot Password Form -->
                <div class="auth-form-container auth-forgot-container">
                    <form action="#" method="POST" class="auth-form">
                        <div class="auth-forgot-icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h2 class="auth-form-title">Reset Password</h2>
                        <p class="auth-forgot-description">Enter your email address and we'll send you a link to reset
                            your password</p>
                        <div class="auth-input-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="auth-input" placeholder="Email Address" required />
                        </div>
                        <button type="submit" class="auth-btn">Send Reset Link</button>
                        <a href="javascript:void(0)" class="auth-back-link" id="backToSignIn">
                            <i class="fa fa-arrow-left"></i> Back to Sign In
                        </a>
                    </form>
                </div>

                <!-- Overlay Container -->
                <div class="auth-overlay-container">
                    <div class="auth-overlay">
                        <div class="auth-overlay-panel auth-overlay-left">
                            <h2 class="auth-overlay-title">Welcome Back!</h2>
                            <p class="auth-overlay-text">To keep connected with us please login with your personal info
                            </p>
                            <button class="auth-btn auth-btn-ghost" id="signIn">Sign In</button>
                        </div>
                        <div class="auth-overlay-panel auth-overlay-right">
                            <h2 class="auth-overlay-title">Hello, Friend!</h2>
                            <p class="auth-overlay-text">Enter your personal details and start journey with us</p>
                            <button class="auth-btn auth-btn-ghost" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const showForgotPassword = document.getElementById('showForgotPassword');
        const backToSignIn = document.getElementById('backToSignIn');
        const container = document.getElementById('authContainer');
        const authModal = document.getElementById('authModal');

        signUpButton.addEventListener('click', () => {
            container.classList.remove('auth-forgot-active');
            container.classList.add('auth-right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('auth-forgot-active');
            container.classList.remove('auth-right-panel-active');
        });

        showForgotPassword.addEventListener('click', () => {
            container.classList.add('auth-forgot-active');
            container.classList.remove('auth-right-panel-active');
        });

        backToSignIn.addEventListener('click', () => {
            container.classList.remove('auth-forgot-active');
        });

        // Password Visibility Toggle
        const togglePasswords = document.querySelectorAll('.toggle-password');
        togglePasswords.forEach(icon => {
            icon.addEventListener('click', function() {
                const input = this.parentElement.querySelector('.password-field');
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-eye-slash');
                    this.classList.add('fa-eye');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-eye');
                    this.classList.add('fa-eye-slash');
                }
            });
        });

        // Reset to sign-in when modal closes
        authModal.addEventListener('hidden.bs.modal', function() {
            container.classList.remove('auth-right-panel-active');
            container.classList.remove('auth-forgot-active');
        });
    });
</script>
