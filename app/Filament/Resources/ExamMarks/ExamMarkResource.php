<?php

namespace App\Filament\Resources\ExamMarks;

use App\Filament\Resources\ExamMarks\Pages\CreateExamMark;
use App\Filament\Resources\ExamMarks\Pages\EditExamMark;
use App\Filament\Resources\ExamMarks\Pages\ListExamMarks;
use App\Filament\Resources\ExamMarks\Schemas\ExamMarkForm;
use App\Filament\Resources\ExamMarks\Tables\ExamMarksTable;
use App\Models\ExamMark;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ExamMarkResource extends Resource
{
    protected static ?string $model = ExamMark::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPencilSquare;

    protected static string|UnitEnum|null $navigationGroup = 'Examinations & Grades';

    protected static ?string $navigationLabel = 'Gradebook & Marks';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ExamMarkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamMarksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExamMarks::route('/'),
            'create' => CreateExamMark::route('/create'),
            'edit' => EditExamMark::route('/{record}/edit'),
        ];
    }
}
