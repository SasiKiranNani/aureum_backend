<?php

namespace App\Filament\Resources\NewsroomResource\Pages;

use App\Filament\Resources\NewsroomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsrooms extends ListRecords
{
    protected static string $resource = NewsroomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
