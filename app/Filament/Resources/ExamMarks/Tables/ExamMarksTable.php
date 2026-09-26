<?php

namespace App\Filament\Resources\ExamMarks\Tables;

use App\Models\Exam;
use App\Models\ExamMark;
use App\Models\SchoolClass;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ExamMarksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('exam.name')
                    ->label('Exam')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('student.admission_number')
                    ->label('Adm. No')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('student.first_name')
                    ->label('Student Name')
                    ->formatStateUsing(fn (ExamMark $record): string => $record->student?->full_name ?? 'N/A')
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('student', function ($q) use ($search) {
                            $q->where('first_name', 'like', "%{$search}%")
                              ->orWhere('last_name', 'like', "%{$search}%");
                        });
                    }),
                TextColumn::make('student.schoolClass.name')
                    ->label('Class')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('subject_name')
                    ->label('Subject')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('score')
                    ->label('Score')
                    ->state(fn (ExamMark $record): string => "{$record->marks_obtained} / {$record->max_marks}"),
                TextColumn::make('percentage')
                    ->label('%')
                    ->state(function (ExamMark $record): string {
                        if ($record->max_marks <= 0) return '0%';
                        $pct = round(($record->marks_obtained / $record->max_marks) * 100, 1);
                        return "{$pct}%";
                    })
                    ->sortable(),
                TextColumn::make('grade')
                    ->label('Grade')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'A+', 'A' => 'success',
                        'B+', 'B' => 'info',
                        'C', 'D' => 'warning',
                        'F' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('remarks')
                    ->label('Remarks')
                    ->limit(25)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('exam_id')
                    ->label('Filter by Exam')
                    ->options(Exam::pluck('name', 'id')),
                SelectFilter::make('class_id')
                    ->label('Filter by Class')
                    ->options(SchoolClass::pluck('name', 'id'))
                    ->query(function (Builder $query, array $data): Builder {
                        if (empty($data['value'])) {
                            return $query;
                        }
                        return $query->whereHas('student', fn ($q) => $q->where('class_id', $data['value']));
                    }),
                SelectFilter::make('grade')
                    ->options([
                        'A+' => 'A+',
                        'A' => 'A',
                        'B+' => 'B+',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'F' => 'F',
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
            ->defaultSort('created_at', 'desc');
    }
}
