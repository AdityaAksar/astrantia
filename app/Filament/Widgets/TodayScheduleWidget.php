<?php

namespace App\Filament\Widgets;

use App\Models\Schedule;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class TodayScheduleWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    protected static ?string $heading = 'Jadwal Kuliah Hari Ini';

    public function table(Table $table): Table
    {
        $days = [
            'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        
        $today = $days[Carbon::now()->format('l')];

        return $table
            ->query(
                Schedule::query()->where('day', $today)->orderBy('start_time')
            )
            ->columns([
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Jam')
                    ->formatStateUsing(fn ($record) => 
                        Carbon::parse($record->start_time)->format('H:i') . ' - ' . 
                        Carbon::parse($record->end_time)->format('H:i')
                    ),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Mata Kuliah')
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('room')
                    ->label('Ruangan')
                    ->icon('heroicon-m-building-office-2'),
                Tables\Columns\TextColumn::make('lecturers')
                    ->label('Dosen')
                    ->badge()
                    ->separator(','),
            ])
            ->paginated(false);
    }
}