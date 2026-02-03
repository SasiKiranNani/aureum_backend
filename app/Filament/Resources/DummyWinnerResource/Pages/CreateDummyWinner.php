<?php

namespace App\Filament\Resources\DummyWinnerResource\Pages;

use App\Filament\Resources\DummyWinnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDummyWinner extends CreateRecord
{
    protected static string $resource = DummyWinnerResource::class;
}
