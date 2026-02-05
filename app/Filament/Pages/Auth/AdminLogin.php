<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login;

class AdminLogin extends Login
{
    protected static string $view = 'filament.pages.auth.admin-login';
    protected static string $layout = 'filament-panels::components.layout.base';
}
