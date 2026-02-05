<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\AdminLogin::class)
            ->brandLogo(asset('logo.png'))
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugins([
                FilamentShieldPlugin::make(),
            ])
            ->navigationGroups([
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Season Management'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Fee Management'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Media Management'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('CMS Management'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Settings'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('User & Roles Management'),
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_END,
                fn(): string => '<link rel="stylesheet" href="' . url('css/admin-theme.css') . '" />'
            )
            ->bootUsing(function (Panel $panel) {
                // Dynamic Past Winners Navigation
                try {
                    $pastSeasons = \App\Models\Season::whereDate('closing_date', '<', now())
                        ->orderBy('closing_date', 'desc')
                        ->get();

                    $navItems = [];
                    foreach ($pastSeasons as $season) {
                        $navItems[] = \Filament\Navigation\NavigationItem::make($season->name)
                            ->group('Past Winners')
                            ->icon('heroicon-o-trophy')
                            ->sort($season->closing_date->timestamp)
                            ->isActiveWhen(fn() => request()->query('season_id') == $season->id)
                            ->url(\App\Filament\Pages\PastWinners::getUrl(['season_id' => $season->id]));
                    }

                    $panel->navigationItems($navItems);
                } catch (\Exception $e) {
                    // Fail silently during migrations/setup if tables don't exist
                }
            });
    }
}
