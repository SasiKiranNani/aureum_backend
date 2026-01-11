<?php

namespace App\Filament\Resources\NomineeQuestionResource\Pages;

use App\Filament\Resources\NomineeQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNomineeQuestions extends ManageRecords
{
    protected static string $resource = NomineeQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
