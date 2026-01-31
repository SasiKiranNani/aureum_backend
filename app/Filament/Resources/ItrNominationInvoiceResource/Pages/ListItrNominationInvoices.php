<?php

namespace App\Filament\Resources\ItrNominationInvoiceResource\Pages;

use App\Filament\Resources\ItrNominationInvoiceResource;
use Filament\Resources\Pages\ListRecords;

class ListItrNominationInvoices extends ListRecords
{
    protected static string $resource = ItrNominationInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
