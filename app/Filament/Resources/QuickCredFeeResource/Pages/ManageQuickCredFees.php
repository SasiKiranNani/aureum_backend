<?php

namespace App\Filament\Resources\QuickCredFeeResource\Pages;

use App\Filament\Resources\QuickCredFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageQuickCredFees extends ManageRecords
{
    protected static string $resource = QuickCredFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
