<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\FeeCollectionChart;
use App\Filament\Widgets\SchoolStatsOverview;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'School ERP Executive Dashboard';

    public function getWidgets(): array
    {
        return [
            SchoolStatsOverview::class,
            FeeCollectionChart::class,
        ];
    }
}
