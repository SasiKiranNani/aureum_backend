<?php

namespace App\Filament\Judge\Pages\Auth;

use Filament\Pages\Auth\Login;

class JudgeLogin extends Login
{
    protected static string $view = 'filament.judge.pages.auth.judge-login';
    protected static string $layout = 'filament-panels::components.layout.base';
}
