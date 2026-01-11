<?php

namespace App\Filament\Resources\AdminFeeResource\Pages;

use App\Filament\Resources\AdminFeeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdminFees extends ListRecords
{
    protected static string $resource = AdminFeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
