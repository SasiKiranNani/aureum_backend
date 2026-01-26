<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('seasons')) {
                // Auto-deactivate expired seasons
                \App\Models\Season::where('is_active', true)
                    ->whereDate('application_deadline_date', '<', now())
                    ->update(['is_active' => false]);

                // Auto-activate current seasons
                \App\Models\Season::where('is_active', false)
                    ->whereDate('opening_date', '<=', now())
                    ->whereDate('application_deadline_date', '>=', now())
                    ->get()
                    ->each(function ($season) {
                        $season->update(['is_active' => true]);
                    });

                $activeSeason = \App\Models\Season::where('is_active', true)
                    ->whereDate('opening_date', '<=', now())
                    ->whereDate('application_deadline_date', '>=', now())
                    ->first();

                $nextSeason = null;
                if (!$activeSeason) {
                    $nextSeason = \App\Models\Season::where('opening_date', '>', now())
                        ->orderBy('opening_date', 'asc')
                        ->first();
                }

                view()->share('activeSeason', $activeSeason);
                view()->share('nextSeason', $nextSeason);
            }
        } catch (\Exception $e) {
            //
        }
    }
}
