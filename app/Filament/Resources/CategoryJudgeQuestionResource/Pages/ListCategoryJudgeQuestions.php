<?php

namespace App\Filament\Resources\CategoryJudgeQuestionResource\Pages;

use App\Filament\Resources\CategoryJudgeQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryJudgeQuestions extends ListRecords
{
    protected static string $resource = CategoryJudgeQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
