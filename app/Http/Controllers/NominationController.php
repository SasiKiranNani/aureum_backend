<?php

namespace App\Http\Controllers;

use App\Models\Nomination;
use App\Models\NominationAnswer;
use App\Models\NominationEvidence;
use App\Models\Season;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NominationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nominee_type' => 'required|in:individual,organization,startup,research_group',
            'full_name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'address' => 'required|string',
            'linkedin_url' => 'required|url',
            'workforce_size' => 'nullable|string',
            'headshot' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'remove_headshot' => 'nullable|boolean',
            'remove_evidence' => 'nullable|array',
            'remove_evidence.*' => 'exists:nomination_evidence,id',
            'category' => 'required|exists:categories,id',
            'award_id' => 'required|exists:awards,id',
            'contribution_title' => 'required|string|max:255',
            'timeframe' => 'required|string',
            'eligibility_justification' => 'required|string|max:500',
            'sensitive_data' => 'required|in:yes,no',
            'controversies' => 'required|in:yes,no',
            'industry_influence' => 'required|in:yes,no',
            'evidence' => 'nullable|array',
            'evidence.*' => 'file|mimes:jpg,jpeg,png,webp,pdf,doc,docx|max:10240',
            'references' => 'nullable|array|max:5',
            'references.*' => 'nullable|url',
            'declaration_accurate' => 'required|accepted',
            'declaration_privacy' => 'required|accepted',
            'discount_code' => 'nullable|string|exists:discounts,code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            DB::beginTransaction();

            // Get active season based on today's date
            $now = now();
            $activeSeason = Season::where('opening_date', '<=', $now)
                ->where('application_deadline_date', '>=', $now)
                ->first();

            if (! $activeSeason) {
                return response()->json([
                    'success' => false,
                    'message' => 'No active season found for the current date. Please check opening and deadline dates.',
                ], 400);
            }

            // Check if we are updating an existing nomination
            $nominationId = $request->input('nomination_id');
            $nomination = null;
            if ($nominationId) {
                $nomination = Nomination::where('user_id', auth()->id())
                    ->where('payment_status', 'pending')
                    ->find($nominationId);
            }

            // Get award details for pricing
            $award = \App\Models\Award::findOrFail($request->award_id);

            // Get active admin fee
            $adminFee = \App\Models\AdminFee::where('is_active', true)->first();
            $adminFeeAmount = $adminFee ? $adminFee->amount : 35.00;

            // Handle headshot upload
            $headshotPath = null;
            if ($request->hasFile('headshot')) {
                // Delete old headshot if exists
                if ($nomination && $nomination->headshot) {
                    Storage::disk('public')->delete($nomination->headshot);
                }
                $headshotPath = $request->file('headshot')->store('nominations/headshots', 'public');
            } elseif ($nomination) {
                // Check if user wants to remove headshot
                if ($request->remove_headshot) {
                    Storage::disk('public')->delete($nomination->headshot);
                    $headshotPath = null;
                } else {
                    $headshotPath = $nomination->headshot;
                }
            }

            // Handle evidence removal
            if ($nomination && $request->has('remove_evidence')) {
                $evidencesToRemove = NominationEvidence::whereIn('id', $request->remove_evidence)
                    ->where('nomination_id', $nomination->id)
                    ->get();

                foreach ($evidencesToRemove as $ev) {
                    if ($ev->type === 'file' && $ev->file_path) {
                        Storage::disk('public')->delete($ev->file_path);
                    }
                    $ev->delete();
                }
            }

            if ($nomination) {
                // Update existing nomination
                $nomination->update([
                    'category_id' => $request->category,
                    'award_id' => $request->award_id,
                    'nominee_type' => $request->nominee_type,
                    'full_name' => $request->full_name,
                    'organization' => $request->organization,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'industry' => $request->industry,
                    'address' => $request->address,
                    'linkedin_url' => $request->linkedin_url,
                    'workforce_size' => $request->workforce_size,
                    'headshot' => $headshotPath,
                    'contribution_title' => $request->contribution_title,
                    'timeframe' => $request->timeframe,
                    'eligibility_justification' => $request->eligibility_justification,
                    'sensitive_data' => $request->sensitive_data,
                    'controversies' => $request->controversies,
                    'industry_influence' => $request->industry_influence,
                    'admin_fee' => $adminFeeAmount,
                ]);
                $applicationId = $nomination->application_id;
            } else {
                // Generate application ID for new nomination using the season
                $applicationId = Nomination::generateApplicationId($activeSeason);

                // Create new nomination
                $nomination = Nomination::create([
                    'application_id' => $applicationId,
                    'user_id' => auth()->id(),
                    'season_id' => $activeSeason->id,
                    'category_id' => $request->category,
                    'award_id' => $request->award_id,
                    'nominee_type' => $request->nominee_type,
                    'full_name' => $request->full_name,
                    'organization' => $request->organization,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'country' => $request->country,
                    'industry' => $request->industry,
                    'address' => $request->address,
                    'linkedin_url' => $request->linkedin_url,
                    'workforce_size' => $request->workforce_size,
                    'headshot' => $headshotPath,
                    'contribution_title' => $request->contribution_title,
                    'timeframe' => $request->timeframe,
                    'eligibility_justification' => $request->eligibility_justification,
                    'sensitive_data' => $request->sensitive_data,
                    'controversies' => $request->controversies,
                    'industry_influence' => $request->industry_influence,
                    'declaration_accurate' => true,
                    'declaration_privacy' => true,
                    'payment_status' => 'pending',
                    'admin_fee' => $adminFeeAmount,
                    'discount_applied' => 0.00,
                ]);
            }

            // Calculate and Apply Discount
            $discountApplied = 0.00;
            if ($request->discount_code) {
                $discount = \App\Models\Discount::where('code', $request->discount_code)
                    ->where('is_active', true)
                    ->first();

                if ($discount) {
                    if ($discount->type === 'fixed') {
                        $discountApplied = $discount->value;
                    } elseif ($discount->type === 'percentage') {
                        $discountApplied = ($award->amount + $adminFeeAmount) * ($discount->value / 100);
                    }

                    $nomination->update([
                        'discount_applied' => $discountApplied,
                        'discount_id' => $discount->id,
                    ]);
                }
            }

            // Save dynamic question answers
            if ($nominationId) {
                $nomination->answers()->delete();
            }
            foreach ($request->all() as $key => $value) {
                if (str_starts_with($key, 'question_')) {
                    $questionId = str_replace('question_', '', $key);
                    NominationAnswer::create([
                        'nomination_id' => $nomination->id,
                        'nominee_question_id' => $questionId,
                        'answer' => $value,
                    ]);
                }
            }

            // Handle evidence file uploads
            if ($request->hasFile('evidence')) {
                foreach ($request->file('evidence') as $file) {
                    $filePath = $file->store('nominations/evidence', 'public');
                    NominationEvidence::create([
                        'nomination_id' => $nomination->id,
                        'type' => 'file',
                        'file_path' => $filePath,
                        'file_name' => $file->getClientOriginalName(),
                        'file_size' => $file->getSize(),
                        'file_type' => $file->getMimeType(),
                    ]);
                }
            }

            // Handle reference links
            if ($request->has('references')) {
                if ($nominationId) {
                    $nomination->evidence()->where('type', 'link')->delete();
                }
                foreach ($request->references as $url) {
                    if (! empty($url)) {
                        NominationEvidence::create([
                            'nomination_id' => $nomination->id,
                            'type' => 'link',
                            'reference_url' => $url,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Nomination submitted successfully!',
                'data' => [
                    'nomination_id' => $nomination->id,
                    'application_id' => $applicationId,
                    'full_name' => $nomination->full_name,
                    'award_name' => $award->name,
                    'award_amount' => $award->amount,
                    'admin_fee' => $adminFeeAmount,
                    'discount_applied' => $discountApplied,
                    'total_amount' => ($award->amount + $adminFeeAmount) - $discountApplied,
                ],
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your nomination.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function generatePdf($application_id)
    {
        $nomination = Nomination::with(['answers.nomineeQuestion', 'evidence', 'category', 'award', 'user'])
            ->where('application_id', $application_id)
            ->firstOrFail();

        // Check if user is authorized
        $user = auth()->user() ?? auth('admin')->user();

        if (! $user) {
            abort(403, 'Unauthorized');
        }

        // Allow if owner OR if user has admin/super_admin roles
        // We use a loose check for 'admin' role or just existence of the admin user to allow access
        $isAdmin = $user->hasAnyRole(['admin', 'super_admin']);

        if ($user->id !== $nomination->user_id && ! $isAdmin) {
            abort(403);
        }

        $pdf = Pdf::loadView('pdf.nomination-pdf', compact('nomination'));

        return $pdf->download('nomination-'.$nomination->application_id.'.pdf');
    }

    public function previewPdf(Request $request)
    {
        // This method generates a preview PDF from form data
        // For now, we'll return a simple response
        // In production, you might want to create a temporary nomination record

        return response()->json([
            'success' => true,
            'message' => 'PDF preview functionality will be implemented after form submission.',
        ]);
    }

    public function checkDiscount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|exists:discounts,code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid discount code.',
            ], 422);
        }

        $discount = \App\Models\Discount::where('code', $request->code)
            ->where('is_active', true)
            ->first();

        if (! $discount) {
            return response()->json([
                'success' => false,
                'message' => 'Discount code is invalid or expired.',
            ], 422);
        }

        // Check if discount is user-specific and matches current user (optional strict check)
        // If user_id is set, it must match auth user. If null, it's generic.
        if ($discount->user_id && $discount->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'This discount code is not applicable to your account.',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'type' => $discount->type,
                'value' => $discount->value,
                'code' => $discount->code,
            ],
        ]);
    }

    public function downloadEvidence($id)
    {
        $evidence = NominationEvidence::findOrFail($id);

        if ($evidence->type !== 'file' || ! $evidence->file_path) {
            abort(404, 'File not found or not a valid file evidence.');
        }

        if (! Storage::disk('public')->exists($evidence->file_path)) {
            abort(404, 'The requested file does not exist on the server.');
        }

        return Storage::disk('public')->download($evidence->file_path, $evidence->file_name);
    }

    public function downloadHeadshot($application_id)
    {
        $nomination = Nomination::where('application_id', $application_id)->firstOrFail();

        if (! $nomination->headshot) {
            abort(404, 'Headshot not found.');
        }

        if (! Storage::disk('public')->exists($nomination->headshot)) {
            abort(404, 'The requested headshot file does not exist on the server.');
        }

        $extension = pathinfo($nomination->headshot, PATHINFO_EXTENSION);
        $fileName = 'headshot_'.$application_id.'.'.$extension;

        return Storage::disk('public')->download($nomination->headshot, $fileName);
    }

    public function destroy($application_id)
    {
        try {
            $nomination = Nomination::where('user_id', auth()->id())
                ->where('application_id', $application_id)
                ->where('payment_status', 'pending')
                ->firstOrFail();

            DB::beginTransaction();

            // Delete headshot
            if ($nomination->headshot) {
                Storage::disk('public')->delete($nomination->headshot);
            }

            // Delete evidence files
            foreach ($nomination->evidence as $evidence) {
                if ($evidence->type === 'file' && $evidence->file_path) {
                    Storage::disk('public')->delete($evidence->file_path);
                }
            }

            // Delete related records
            $nomination->answers()->delete();
            $nomination->evidence()->delete();
            $nomination->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Nomination deleted successfully.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete nomination: '.$e->getMessage(),
            ], 500);
        }
    }
}
