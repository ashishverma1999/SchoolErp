<?php

namespace App\Filament\Resources\FeeInvoices\Pages;

use App\Filament\Resources\FeeInvoices\FeeInvoiceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFeeInvoice extends ViewRecord
{
    protected static string $resource = FeeInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
