<?php

namespace App\Filament\Resources\Teachers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Teacher Identity & Employment')
                    ->description('Faculty identification and employment details')
                    ->columns(3)
                    ->schema([
                        TextInput::make('employee_id')
                            ->label('Employee / Faculty ID')
                            ->default(fn () => 'EMP-' . date('Y') . '-' . str_pad((string) rand(10, 999), 3, '0', STR_PAD_LEFT))
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(50),
                        DatePicker::make('joining_date')
                            ->label('Date of Joining')
                            ->default(now())
                            ->required(),
                        Select::make('status')
                            ->label('Employment Status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'on_leave' => 'On Leave',
                            ])
                            ->default('active')
                            ->required(),
                    ]),

                Section::make('Personal & Contact Information')
                    ->columns(2)
                    ->schema([
                        TextInput::make('first_name')
                            ->label('First Name')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('last_name')
                            ->label('Last Name')
                            ->required()
                            ->maxLength(100),
                        TextInput::make('email')
                            ->label('Work / Personal Email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(150),
                        TextInput::make('phone')
                            ->label('Mobile Phone')
                            ->tel()
                            ->required()
                            ->maxLength(30),
                        TextInput::make('qualification')
                            ->label('Educational Qualifications')
                            ->placeholder('e.g. M.Sc. Physics, B.Ed, Ph.D')
                            ->maxLength(150)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
