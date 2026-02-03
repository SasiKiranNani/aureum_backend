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
        'invoice_no',
        'itr_invoice_no',
        'invoice_path',
        'itr_invoice_path',
        'paid_at',
        'manual_invoice',
        'manual_transaction_id',
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

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }

    protected $casts = [
        'declaration_accurate' => 'boolean',
        'declaration_privacy' => 'boolean',
        'amount_paid' => 'decimal:2',
        'admin_fee' => 'decimal:2',
        'discount_applied' => 'decimal:2',
        'paid_at' => 'datetime',
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
        return self::generateIdFromSeason($season, 'application_id');
    }

    public static function generateInvoiceId(?Season $season = null): string
    {
        return self::generateIdFromSeason($season, 'invoice_no');
    }

    public static function generateItrInvoiceId(?Season $season = null): string
    {
        return self::generateIdFromSeason($season, 'itr_invoice_no');
    }

    private static function generateIdFromSeason(?Season $season, string $type): string
    {
        $now = now();

        // Find season if not provided
        if (! $season) {
            $season = Season::where('opening_date', '<=', $now)
                ->where('application_deadline_date', '>=', $now)
                ->first();
        }

        if (! $season) {
            // Fallback to legacy format
            $year = date('Y');
            $prefix = match ($type) {
                'invoice_no' => 'INV-',
                'itr_invoice_no' => 'ITR-',
                default => 'AUR-',
            }.$year.'-';

            $lastNomination = self::whereYear('created_at', $year)
                ->whereNull('season_id')
                ->whereNotNull($type)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastNomination && strpos($lastNomination->$type, $prefix) === 0) {
                preg_match('/(\d+)$/', $lastNomination->$type, $matches);
                $lastNumber = isset($matches[1]) ? (int) $matches[1] : 0;
                $newNumber = $lastNumber + 1;
                $prefix = substr($lastNomination->$type, 0, -strlen($matches[1]));
            } else {
                $newNumber = 1;
            }

            return $prefix.str_pad($newNumber, 5, '0', STR_PAD_LEFT);
        }

        // Season exists
        $startId = $season->$type; // e.g., AUR-2026-00001

        $lastNomination = self::where('season_id', $season->id)
            ->whereNotNull($type)
            ->orderBy('id', 'desc')
            ->first();

        if (! $lastNomination) {
            return $startId ?: match ($type) {
                'invoice_no' => 'INV-',
                'itr_invoice_no' => 'ITR-',
                default => 'AUR-',
            }.date('Y', strtotime($season->opening_date)).'-00001';
        }

        if (preg_match('/(\d+)$/', $lastNomination->$type, $matches)) {
            $numberStr = $matches[1];
            $length = strlen($numberStr);
            $nextNumber = (int) $numberStr + 1;
            $prefix = substr($lastNomination->$type, 0, -$length);

            return $prefix.str_pad($nextNumber, $length, '0', STR_PAD_LEFT);
        }

        return $lastNomination->$type.'-'.(self::where('season_id', $season->id)->count() + 1);
    }
}
