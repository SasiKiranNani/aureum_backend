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
                    ->whereDate('closing_date', '<', now())
                    ->update(['is_active' => false]);

                // Auto-activate current seasons
                \App\Models\Season::where('is_active', false)
                    ->whereDate('opening_date', '<=', now())
                    ->whereDate('closing_date', '>=', now())
                    ->get()
                    ->each(function ($season) {
                        $season->update(['is_active' => true]);
                    });
            }
        } catch (\Exception $e) {
            //
        }
    }
}
