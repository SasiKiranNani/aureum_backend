<?php

namespace App\Filament\Resources\JudgeApplicationResource\Pages;

use App\Filament\Resources\JudgeApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJudgeApplications extends ListRecords
{
    protected static string $resource = JudgeApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
