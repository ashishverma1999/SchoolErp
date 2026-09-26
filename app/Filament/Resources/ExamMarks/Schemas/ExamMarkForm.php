<?php

namespace App\Filament\Resources\ExamMarks\Schemas;

use App\Models\Exam;
use App\Models\Student;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ExamMarkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Gradebook Entry & Score')
                    ->description('Record examination scores and evaluations per subject')
                    ->columns(3)
                    ->schema([
                        Select::make('exam_id')
                            ->label('Examination')
                            ->options(Exam::orderBy('start_date', 'desc')->pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                        Select::make('student_id')
                            ->label('Student')
                            ->options(function () {
                                return Student::with('schoolClass')->get()->mapWithKeys(function ($student) {
                                    $className = $student->schoolClass?->name ?? 'No Class';
                                    return [$student->id => "[{$student->admission_number}] {$student->full_name} ({$className})"];
                                });
                            })
                            ->searchable()
                            ->required(),
                        TextInput::make('subject_name')
                            ->label('Subject')
                            ->placeholder('e.g. Mathematics, Science, English')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('marks_obtained')
                            ->label('Marks Obtained')
                            ->numeric()
                            ->minValue(0)
                            ->required(),
                        TextInput::make('max_marks')
                            ->label('Maximum Marks')
                            ->numeric()
                            ->default(100)
                            ->minValue(1)
                            ->required(),
                        Select::make('grade')
                            ->label('Grade (Leave blank to auto-calculate)')
                            ->options([
                                'A+' => 'A+ (90-100%)',
                                'A'  => 'A (80-89%)',
                                'B+' => 'B+ (70-79%)',
                                'B'  => 'B (60-69%)',
                                'C'  => 'C (50-59%)',
                                'D'  => 'D (40-49%)',
                                'F'  => 'F (< 40% Fail)',
                            ]),
                        Textarea::make('remarks')
                            ->label('Teacher Remarks / Observations')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
