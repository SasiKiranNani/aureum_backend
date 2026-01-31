<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nomination extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'user_id',
        'season_id',
        'category_id',
        'award_id',
        'nominee_type',
        'full_name',
        'organization',
        'email',
        'phone',
        'country',
        'industry',
        'address',
        'linkedin_url',
        'workforce_size',
        'headshot',
        'contribution_title',
        'timeframe',
        'eligibility_justification',
        'sensitive_data',
        'controversies',
        'industry_influence',
        'declaration_accurate',
        'declaration_privacy',
        'payment_status',
        'payment_method',
        'amount_paid',
        'admin_fee',
        'discount_applied',
        'discount_id',
        'payment_gateway_id',
        'judge_id',
        'status',
        'final_score',
        'final_grade',
    ];

    public function judge(): BelongsTo
    {
        return $this->belongsTo(User::class, 'judge_id');
    }

    public function evaluation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(NominationEvaluation::class);
    }

    public function paymentGateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class);
    }

    protected $casts = [
        'declaration_accurate' => 'boolean',
        'declaration_privacy' => 'boolean',
        'amount_paid' => 'decimal:2',
        'admin_fee' => 'decimal:2',
        'discount_applied' => 'decimal:2',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function award(): BelongsTo
    {
        return $this->belongsTo(Award::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(NominationAnswer::class);
    }

    public function evidence(): HasMany
    {
        return $this->hasMany(NominationEvidence::class);
    }

    // Generate unique application ID
    public static function generateApplicationId(?Season $season = null): string
    {
        $now = now();
        
        // Find season if not provided
        if (!$season) {
            $season = Season::where('opening_date', '<=', $now)
                ->where('application_deadline_date', '>=', $now)
                ->first();
        }

        if (!$season) {
            // Fallback to legacy format if no season is found or active
            $year = date('Y');
            $prefix = 'AUR-' . $year . '-';
            
            $lastNomination = self::whereYear('created_at', $year)
                ->whereNull('season_id')
                ->orderBy('id', 'desc')
                ->first();
                
            if ($lastNomination && strpos($lastNomination->application_id, $prefix) === 0) {
                // Extract numeric part and increment
                preg_match('/(\d+)$/', $lastNomination->application_id, $matches);
                $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
                $newNumber = $lastNumber + 1;
                $prefix = substr($lastNomination->application_id, 0, -strlen($matches[1]));
            } else {
                $newNumber = 1;
                $prefix = 'AUR-' . $year . '-';
            }
            return $prefix . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        }

        // Season exists
        $startId = $season->application_id; // e.g., AUR-2026-00001
        
        // Get the last nomination for this season to see where we are
        $lastNomination = self::where('season_id', $season->id)
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastNomination) {
            // No nominations yet, use the start ID from season settings
            return $startId ?: 'AUR-' . date('Y', strtotime($season->opening_date)) . '-00001';
        }

        // Increment from the last nomination's application_id
        // We look for the numeric part at the end
        if (preg_match('/(\d+)$/', $lastNomination->application_id, $matches)) {
            $numberStr = $matches[1];
            $length = strlen($numberStr);
            $nextNumber = (int)$numberStr + 1;
            
            // Reconstruct the ID (prefix + padded next number)
            $prefix = substr($lastNomination->application_id, 0, -$length);
            return $prefix . str_pad($nextNumber, $length, '0', STR_PAD_LEFT);
        }

        // Fallback: just append count if regex fails
        return $lastNomination->application_id . '-' . (self::where('season_id', $season->id)->count() + 1);
    }
}
