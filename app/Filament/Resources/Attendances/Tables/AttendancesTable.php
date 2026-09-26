<?php

namespace App\Filament\Resources\Attendances\Tables;

use App\Models\Attendance;
use App\Models\SchoolClass;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')
                    ->label('Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('student.admission_number')
                    ->label('Adm. No')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('student.first_name')
                    ->label('Student Name')
                    ->formatStateUsing(fn (Attendance $record): string => $record->student?->full_name ?? 'N/A')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('student', function ($q) use ($search) {
                            $q->where('first_name', 'like', "%{$search}%")
                              ->orWhere('last_name', 'like', "%{$search}%");
                        });
                    }),
                TextColumn::make('student.schoolClass.name')
                    ->label('Class')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('student.section.name')
                    ->label('Section')
                    ->badge()
                    ->color('gray')
                    ->placeholder('-'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->color(fn (string $state): string => match ($state) {
                        'present' => 'success',
                        'absent' => 'danger',
                        'late' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('remarks')
                    ->label('Remarks')
                    ->limit(35)
                    ->toggleable(),
            ])
            ->filters([
                Filter::make('today')
                    ->label('Today\'s Attendance')
                    ->query(fn (Builder $query): Builder => $query->whereDate('date', today()))
                    ->default(),
                SelectFilter::make('status')
                    ->options([
                        'present' => 'Present',
                        'absent' => 'Absent',
                        'late' => 'Late',
                    ]),
                SelectFilter::make('class_id')
                    ->label('Class')
                    ->options(SchoolClass::pluck('name', 'id'))
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        return $query->whereHas('student', fn ($q) => $q->where('class_id', $data['value']));
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('date', 'desc');
    }
}
