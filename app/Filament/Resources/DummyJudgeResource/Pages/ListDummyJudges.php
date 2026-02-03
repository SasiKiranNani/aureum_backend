<?php

namespace App\Filament\Resources\DummyJudgeResource\Pages;

use App\Filament\Resources\DummyJudgeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDummyJudges extends ListRecords
{
    protected static string $resource = DummyJudgeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
