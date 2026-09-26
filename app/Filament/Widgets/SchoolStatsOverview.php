<?php

namespace App\Filament\Widgets;

use App\Models\AdmissionEnquiry;
use App\Models\Attendance;
use App\Models\FeePayment;
use App\Models\Student;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SchoolStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // 1. Total Active Students
        $activeStudentsCount = Student::where('status', 'active')->count();

        // 2. Today's Attendance %
        $presentTodayCount = Attendance::today()->where('status', 'present')->count();
        $attendancePercentage = $activeStudentsCount > 0
            ? round(($presentTodayCount / $activeStudentsCount) * 100, 1)
            : 0;

        $attendanceColor = match (true) {
            $attendancePercentage >= 90 => 'success',
            $attendancePercentage >= 75 => 'warning',
            default => 'danger',
        };

        // 3. Monthly Fee Collection Total
        $currentMonthCollection = (float) FeePayment::whereMonth('payment_date', now()->month)
            ->whereYear('payment_date', now()->year)
            ->sum('amount_paid');

        // 4. Pending Admissions Enquiries
        $pendingAdmissionsCount = class_exists(AdmissionEnquiry::class)
            ? AdmissionEnquiry::whereIn('status', ['new', 'contacted'])->count()
            : 0;

        return [
            Stat::make('Total Active Students', number_format($activeStudentsCount))
                ->description('Enrolled active scholars')
                ->descriptionIcon(Heroicon::OutlinedAcademicCap)
                ->color('success')
                ->chart([
                    max(1, (int) round($activeStudentsCount * 0.7)),
                    max(1, (int) round($activeStudentsCount * 0.78)),
                    max(1, (int) round($activeStudentsCount * 0.85)),
                    max(1, (int) round($activeStudentsCount * 0.92)),
                    $activeStudentsCount,
                ]),

            Stat::make("Today's Attendance", "{$attendancePercentage}%")
                ->description("{$presentTodayCount} of {$activeStudentsCount} present today")
                ->descriptionIcon(Heroicon::OutlinedCalendarDays)
                ->color($attendanceColor)
                ->chart([82, 86, 91, 89, 93, $attendancePercentage]),

            Stat::make('Monthly Fee Collection', '₹' . number_format($currentMonthCollection, 2))
                ->description(now()->format('F Y') . ' revenue')
                ->descriptionIcon(Heroicon::OutlinedBanknotes)
                ->color('primary')
                ->chart([
                    (int) round($currentMonthCollection * 0.4),
                    (int) round($currentMonthCollection * 0.6),
                    (int) round($currentMonthCollection * 0.8),
                    (int) round($currentMonthCollection),
                ]),

            Stat::make('Pending Admissions', number_format($pendingAdmissionsCount))
                ->description('New & contacted inquiries')
                ->descriptionIcon(Heroicon::OutlinedInbox)
                ->color($pendingAdmissionsCount > 0 ? 'warning' : 'gray')
                ->chart([4, 7, 5, 8, 12, $pendingAdmissionsCount]),
        ];
    }
}
