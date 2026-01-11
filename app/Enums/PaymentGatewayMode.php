<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PaymentGatewayMode: string implements HasLabel, HasColor
{
    case Sandbox = 'sandbox';
    case Production = 'production';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Sandbox => 'Sandbox',
            self::Production => 'Production',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Sandbox => 'warning',
            self::Production => 'success',
        };
    }
}
