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
    ];

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
    public static function generateApplicationId(): string
    {
        $year = date('Y');
        $lastNomination = self::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastNomination) {
            // Extract number from last application ID
            $lastNumber = (int) substr($lastNomination->application_id, -5);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'AUR-' . $year . '-' . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    }
}
