<?php

namespace App\Filament\Resources\NominationResource\Pages;

use App\Filament\Resources\NominationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewNomination extends ViewRecord
{
    protected static string $resource = NominationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('download_pdf')
                ->label('Download PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->url(fn (): string => route('nomination.pdf', $this->record->application_id))
                ->openUrlInNewTab()
                ->color('success'),
        ];
    }
}
