<?php

namespace App\Filament\Widgets;

use App\Models\FeePayment;
use Filament\Widgets\ChartWidget;

class FeeCollectionChart extends ChartWidget
{
    protected ?string $heading = 'Fee Collection Trends (Last 6 Months)';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthLabel = $date->format('M Y');

            $monthlySum = (float) FeePayment::whereYear('payment_date', $date->year)
                ->whereMonth('payment_date', $date->month)
                ->sum('amount_paid');

            $labels[] = $monthLabel;
            $data[] = round($monthlySum, 2);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Fee Collections (₹)',
                    'data' => $data,
                    'fill' => 'start',
                    'borderColor' => '#f59e0b',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.15)',
                    'tension' => 0.35,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
