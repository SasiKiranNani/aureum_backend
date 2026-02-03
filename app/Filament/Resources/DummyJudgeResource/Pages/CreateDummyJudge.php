<?php

namespace App\Filament\Resources\DummyJudgeResource\Pages;

use App\Filament\Resources\DummyJudgeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDummyJudge extends CreateRecord
{
    protected static string $resource = DummyJudgeResource::class;
}
