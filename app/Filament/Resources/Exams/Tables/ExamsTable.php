<?php

namespace App\Filament\Resources\Exams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Examination')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('term')
                    ->label('Term')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('academic_year')
                    ->label('Session / Year')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('End Date')
                    ->date()
                    ->placeholder('-'),
                TextColumn::make('marks_count')
                    ->counts('marks')
                    ->label('Marks Logged')
                    ->badge()
                    ->color('success'),
            ])
            ->filters([
                SelectFilter::make('term')
                    ->options([
                        'Term 1' => 'Term 1',
                        'Term 2' => 'Term 2',
                        'Final' => 'Final',
                        'Unit Test' => 'Unit Test',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('start_date', 'desc');
    }
}
