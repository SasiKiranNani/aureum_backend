<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'opening_date',
        'closing_date',
        'application_deadline_date',
        'is_active',
        'application_id',
        'invoice_no',
        'itr_invoice_no',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'opening_date' => 'date',
            'closing_date' => 'date',
            'application_deadline_date' => 'date',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Season $season) {
            // Check for overlaps
            $overlap = static::where(function ($query) use ($season) {
                $query->whereBetween('opening_date', [$season->opening_date, $season->closing_date])
                    ->orWhereBetween('closing_date', [$season->opening_date, $season->closing_date])
                    ->orWhere(function ($q) use ($season) {
                        $q->where('opening_date', '<=', $season->opening_date)
                            ->where('closing_date', '>=', $season->closing_date);
                    });
            })
                ->where('id', '!=', $season->id)
                ->exists();

            if ($overlap) {
                throw new \InvalidArgumentException("Season dates overlap with an existing season.");
            }

            // Strict Toggle Validation: Only allow is_active if within date range.
            // if ($season->is_active && !now()->between($season->opening_date, $season->closing_date)) {
            //     throw new \InvalidArgumentException("Cannot activate a season that is outside its scheduled date range.");
            // }

            // Auto-Active Logic: If current date is within range, set active.
            if (now()->between($season->opening_date, $season->closing_date)) {
                $season->is_active = true;
            }

            // Single Active Logic
            if ($season->is_active) {
                static::where('id', '!=', $season->id)
                    ->where('is_active', true)
                    ->update(['is_active' => false]);
            }
        });
    }
}
