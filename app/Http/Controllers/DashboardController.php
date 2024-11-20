<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getActiveUsers()
    {
        $activeUsersCount = DB::table('users')
            ->where('last_login', '>=', Carbon::now()->subDays(30))
            ->count();

        return response()->json($activeUsersCount);
    }

    // Get average cycle usage over time
    public function getAverageCycleUsage()
    {
        $averageUsage = DB::table('cycle_a_s')
            ->union(DB::table('cycle_b_s'))
            ->union(DB::table('cycle_c_s'))
            ->selectRaw('DATE(created_at) as date, AVG(current) as avg_usage')
            ->groupBy('date')
            ->get();

        return response()->json($averageUsage);
    }

    // Get cycles near their max limit
    public function getCyclesNearLimit()
    {
        $cycles = DB::table('cycle_a_s')
            ->union(DB::table('cycle_b_s'))
            ->union(DB::table('cycle_c_s'))
            ->whereRaw('max - current < ?', [10])
            ->get();

        return response()->json($cycles);
    }

    // Get total hours used
    public function getTotalHours()
    {
        $totalHours = DB::table('hours')
            ->union(DB::table('hour_b_s'))
            ->union(DB::table('hourcs'))
            ->sum('current');

        return response()->json($totalHours);
    }

    // Get upcoming events
    public function getUpcomingEvents()
    {
        $upcomingEvents = DB::table('d_ate_a_s')
            ->union(DB::table('d_ate_b_s'))
            ->union(DB::table('d_ate_c_s'))
            ->where('start', '>', now())
            ->orderBy('start', 'asc')
            ->take(5)
            ->get();

        return response()->json($upcomingEvents);
    }
}
