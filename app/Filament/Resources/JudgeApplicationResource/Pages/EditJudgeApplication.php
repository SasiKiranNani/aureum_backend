<?php

namespace App\Filament\Resources\JudgeApplicationResource\Pages;

use App\Filament\Resources\JudgeApplicationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJudgeApplication extends EditRecord
{
    protected static string $resource = JudgeApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
