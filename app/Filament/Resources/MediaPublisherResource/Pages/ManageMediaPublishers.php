<?php

namespace App\Filament\Resources\MediaPublisherResource\Pages;

use App\Filament\Resources\MediaPublisherResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMediaPublishers extends ManageRecords
{
    protected static string $resource = MediaPublisherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
