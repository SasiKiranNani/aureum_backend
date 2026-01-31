<?php

namespace App\Filament\Judge\Widgets;

use App\Models\Nomination;
use App\Models\Season;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    // Refresh stats when filtering
    protected int | string | array $columnSpan = 'full';

    public ?string $filter = null;

    protected function getFilters(): ?array
    {
        // Get active seasons for the dropdown
        return Season::query()
            ->orderBy('id', 'desc')
            ->pluck('name', 'id')
            ->toArray();
    }

    protected function getStats(): array
    {
        $user = Auth::user();
        
        // Base query for nominations assigned to this judge
        $query = Nomination::query()->where('judge_id', $user->id);
        
        // For Filter:
        $seasonId = $this->filter;
        
        if ($seasonId) {
             $query->where('season_id', $seasonId);
        }

        $totalNominations = (clone $query)->count();
        
        // Reviewed now implies resolved status (Awarded/Rejected) per user request
        $reviewedCount = (clone $query)->whereIn('status', ['awarded', 'rejected'])->count();
        
        // Pending is strictly 'pending' status
        $pendingCount = (clone $query)->where('status', 'pending')->count();

        // Additional Stats
        $awardedCount = (clone $query)->where('status', 'awarded')->count();
        $rejectedCount = (clone $query)->where('status', 'rejected')->count();

        // Helper for URL parameters
        $filterParams = $seasonId ? ['season' => $seasonId] : [];

        return [
            Stat::make('Total Nominations', $totalNominations)
                ->description('Total nominations assigned')
                ->descriptionIcon('heroicon-o-inbox-stack')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->url(route('filament.judge.pages.dashboard', array_merge($filterParams, ['status' => 'total']))),

            Stat::make('Reviewed', $reviewedCount)
                ->description('Evaluations completed')
                ->descriptionIcon('heroicon-o-check-badge')
                ->color('success')
                ->chart([2, 10, 3, 12, 1, 10, 3])
                ->url(route('filament.judge.pages.dashboard', array_merge($filterParams, ['status' => 'reviewed']))),

            Stat::make('Pending Review', $pendingCount)
                ->description('Awaiting evaluation')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->url(route('filament.judge.pages.dashboard', array_merge($filterParams, ['status' => 'pending']))),

            Stat::make('Awarded', $awardedCount)
                ->description('Nominations awarded')
                ->descriptionIcon('heroicon-o-trophy')
                ->color('amber') 
                ->chart([15, 3, 15, 2, 7, 4, 15])
                ->url(route('filament.judge.pages.dashboard', array_merge($filterParams, ['status' => 'awarded']))),

            Stat::make('Rejected', $rejectedCount)
                ->description('Nominations rejected')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger')
                ->chart([2, 5, 2, 5, 2, 6, 2])
                ->url(route('filament.judge.pages.dashboard', array_merge($filterParams, ['status' => 'rejected']))),
        ];
    }
}
