<?php

namespace App\Filament\Resources\NominationResource\Pages;

use App\Filament\Resources\NominationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNomination extends EditRecord
{
    protected static string $resource = NominationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
