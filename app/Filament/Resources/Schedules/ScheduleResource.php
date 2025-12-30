<?php

namespace App\Filament\Resources\Schedules;

use App\Filament\Resources\Schedules\Pages\CreateSchedule;
use App\Filament\Resources\Schedules\Pages\EditSchedule;
use App\Filament\Resources\Schedules\Pages\ListSchedules;
use App\Filament\Resources\Schedules\Schemas\ScheduleForm;
use App\Filament\Resources\Schedules\Tables\SchedulesTable;
use App\Models\Schedule;
use BackedEnum;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TagsInput;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'subject';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('day')
                    ->options([
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat',
                    ])
                    ->required()
                    ->label('Hari'),

                TextInput::make('subject')
                    ->required()
                    ->maxLength(255)
                    ->label('Mata Kuliah'),

                TextInput::make('class')
                    ->required()
                    ->maxLength(255)
                    ->label('Kelas'),
                
                TextInput::make('room')
                    ->required()
                    ->maxLength(50)
                    ->label('Ruang')
                    ->placeholder('Contoh: SG07, TI02, dsb.'),

                TagsInput::make('lecturers')
                    ->required()
                    ->placeholder('Ketik nama dosen, lalu tekan Enter')
                    ->columnSpanFull()
                    ->splitKeys(['Tab', 'Enter'])
                    ->label('Dosen Pengampu'),

                TimePicker::make('start_time')
                    ->required()
                    ->seconds(false)
                    ->label('Jam Mulai'),

                TimePicker::make('end_time')
                    ->required()
                    ->seconds(false)
                    ->label('Jam Selesai'),
                    ]);
    }

    public static function table(Table $table): Table
    {
        return SchedulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSchedules::route('/'),
            'create' => CreateSchedule::route('/create'),
            'edit' => EditSchedule::route('/{record}/edit'),
        ];
    }
}
