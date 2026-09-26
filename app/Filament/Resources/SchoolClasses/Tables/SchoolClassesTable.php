<?php

namespace App\Filament\Resources\SchoolClasses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SchoolClassesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Class Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('numeric_grade')
                    ->label('Numeric Grade')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('sections_count')
                    ->counts('sections')
                    ->label('Sections')
                    ->badge()
                    ->color('info'),
                TextColumn::make('students_count')
                    ->counts('students')
                    ->label('Active Students')
                    ->badge()
                    ->color('success'),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('numeric_grade', 'asc');
    }
}
