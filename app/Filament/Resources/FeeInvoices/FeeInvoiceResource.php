<?php

namespace App\Filament\Resources\FeeInvoices;

use App\Filament\Resources\FeeInvoices\Pages\CreateFeeInvoice;
use App\Filament\Resources\FeeInvoices\Pages\EditFeeInvoice;
use App\Filament\Resources\FeeInvoices\Pages\ListFeeInvoices;
use App\Filament\Resources\FeeInvoices\Pages\ViewFeeInvoice;
use App\Filament\Resources\FeeInvoices\Schemas\FeeInvoiceForm;
use App\Filament\Resources\FeeInvoices\Tables\FeeInvoicesTable;
use App\Models\FeeInvoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FeeInvoiceResource extends Resource
{
    protected static ?string $model = FeeInvoice::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static string|UnitEnum|null $navigationGroup = 'Finance & Fees';

    protected static ?string $navigationLabel = 'Fee Invoices';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'invoice_number';

    public static function form(Schema $schema): Schema
    {
        return FeeInvoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FeeInvoicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFeeInvoices::route('/'),
            'create' => CreateFeeInvoice::route('/create'),
            'view' => ViewFeeInvoice::route('/{record}'),
            'edit' => EditFeeInvoice::route('/{record}/edit'),
        ];
    }
}
