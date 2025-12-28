<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Assignment;
use App\Models\Material;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Mahasiswa', Student::count())
                ->description('Mahasiswa aktif')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
                
            Stat::make('Tugas Aktif', Assignment::where('deadline', '>=', now())->count())
                ->description('Belum deadline')
                ->descriptionIcon('heroicon-m-clipboard-document-list')
                ->color('warning'),
                
            Stat::make('Materi Kuliah', Material::count())
                ->description('Total file diupload')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('info'),
        ];
    }
}