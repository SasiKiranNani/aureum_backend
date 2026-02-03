<?php

namespace App\Filament\Resources\DummyWinnerResource\Pages;

use App\Filament\Resources\DummyWinnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDummyWinners extends ListRecords
{
    protected static string $resource = DummyWinnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
