<?php

namespace App\Services;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getStatistics(): array
    {
        return [
            'total_students' => Student::count(),
            'total_users' => User::count(),
            'recent_registrations' => Student::latest()->take(5)->get(),
            'growth_statistics' => $this->getGrowthStatistics(),
        ];
    }

    protected function getGrowthStatistics(): Collection
    {
        $driver = DB::connection()->getDriverName();
        $monthExpression = $driver === 'sqlite'
            ? "strftime('%Y-%m', created_at)"
            : "DATE_FORMAT(created_at, '%Y-%m')";

        return Student::query()
            ->selectRaw("{$monthExpression} as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(fn ($row) => [
                'month' => $row->month,
                'label' => date('M Y', strtotime($row->month.'-01')),
                'total' => (int) $row->total,
            ]);
    }
}
