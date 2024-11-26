<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
     // Fetch data for the pie chart
     public function getPieChartData()
     {
         $data = [
             'fresh' => DB::table('cycle_a_s')->where('current', 0)->count()
                      + DB::table('cycle_b_s')->where('current', 0)->count()
                      + DB::table('cycle_c_s')->where('current', 0)->count(),
             'critical' => DB::table('cycle_a_s')->whereRaw('max - current < 5')->count()
                           + DB::table('cycle_b_s')->whereRaw('max - current < 5')->count()
                           + DB::table('cycle_c_s')->whereRaw('max - current < 50')->count(),
             'non_critical' => DB::table('cycle_a_s')->whereRaw('max - current BETWEEN 5 AND 15')->count()
                               + DB::table('cycle_b_s')->whereRaw('max - current BETWEEN 5 AND 15')->count()
                               + DB::table('cycle_c_s')->whereRaw('max - current BETWEEN 51 AND 100')->count(),
         ];

         return response()->json($data);
     }

     // Fetch data for the bar chart
     public function getBarChartData()
     {
         $today = Carbon::today();
         $nextWeek = $today->copy()->addWeek();
         $nextMonth = $today->copy()->addMonth();

         $data = [
             'fresh' => DB::table('d_ate_a_s')->where('start', $today->toDateString())->count()
                       + DB::table('d_ate_b_s')->where('start', $today->toDateString())->count()
                       + DB::table('d_ate_c_s')->where('start', $today->toDateString())->count(),
             'critical' => DB::table('d_ate_a_s')->where('max', '<', $nextWeek)->count()
                            + DB::table('d_ate_b_s')->where('max', '<', $nextWeek)->count()
                            + DB::table('d_ate_c_s')->where('max', '<', $nextWeek)->count(),
             'non_critical' => DB::table('d_ate_a_s')->whereBetween('max', [$nextWeek, $nextMonth])->count()
                               + DB::table('d_ate_b_s')->whereBetween('max', [$nextWeek, $nextMonth])->count()
                               + DB::table('d_ate_c_s')->whereBetween('max', [$nextWeek, $nextMonth])->count(),
         ];

         return response()->json($data);
     }

     public function getAnalyticsData(Request $request)
{
    $dateFilter = $request->get('date', Carbon::today()->toDateString());

    $data = [
        'fresh' => [
            'cycles' => DB::table('cycle_a_s')->where('current', 0)->count()
                        + DB::table('cycle_b_s')->where('current', 0)->count(),
                        + DB::table('cycle_c_s')->where('current', 0)->count(),
            'hours' => DB::table('hours')->where('current', 0)->count()
                        + DB::table('hour_b_s')->where('current', 0)->count(),
                        + DB::table('hourcs')->where('current', 0)->count(),
            'dates' => DB::table('d_ate_a_s')->where('start', $dateFilter)->count()
                        + DB::table('d_ate_b_s')->where('start', $dateFilter)->count(),
                        + DB::table('d_ate_c_s')->where('start', $dateFilter)->count(),
        ],
        'critical' => [
            'cycles' => DB::table('cycle_a_s')->whereRaw('max - current < 5')->count()
                        + DB::table('cycle_b_s')->whereRaw('max - current < 5')->count(),
                        + DB::table('cycle_c_s')->whereRaw('max - current < 5')->count(),
            'hours' => DB::table('hours')->whereRaw('max - current < 50')->count()
                        + DB::table('hour_b_s')->whereRaw('max - current < 50')->count(),
                        + DB::table('hourcs')->whereRaw('max - current < 50')->count(),
            'dates' => DB::table('d_ate_a_s')->where('max', '<', Carbon::now()->addWeek())->count()
                        + DB::table('d_ate_b_s')->where('max', '<', Carbon::now()->addWeek())->count(),
                        + DB::table('d_ate_c_s')->where('max', '<', Carbon::now()->addWeek())->count(),
        ],
        'non_critical' => [
            'cycles' => DB::table('cycle_a_s')->whereRaw('max - current BETWEEN 5 AND 15')->count(),
                         + DB::table('cycle_b_s')->whereRaw('max - current BETWEEN 5 AND 15')->count(),
                         + DB::table('cycle_c_s')->whereRaw('max - current BETWEEN 5 AND 15')->count(),
            'hours' => DB::table('hours')->whereRaw('max - current BETWEEN 50 AND 100')->count()
                        + DB::table('hour_b_s')->whereRaw('max - current BETWEEN 50 AND 100')->count(),
                        + DB::table('hourcs')->whereRaw('max - current BETWEEN 50 AND 100')->count(),
            'dates' => DB::table('d_ate_a_s')->whereBetween('max', [Carbon::now()->addWeek(), Carbon::now()->addDays(24)])->count(),
                        + DB::table('d_ate_b_s')->whereBetween('max', [Carbon::now()->addWeek(), Carbon::now()->addDays(24)])->count(),
                        + DB::table('d_ate_c_s')->whereBetween('max', [Carbon::now()->addWeek(), Carbon::now()->addDays(24)])->count(),
        ],
    ];

    return response()->json($data);
}

public function getPlaneAnalyticsData()
{
    $planes = ['AFA', 'AFB', 'AFC'];
    $data = [];

    foreach ($planes as $plane) {
        if ($plane == 'AFA') {
            $cycleTable = 'cycle_a_s';
            $hourTable = 'hours';
            $dateTable = 'd_ate_c_s';
        } elseif ($plane == 'AFB') {
            $cycleTable = 'cycle_b_s';
            $hourTable = 'hour_b_s';
            $dateTable = 'd_ate_b_s';
        } elseif ($plane == 'AFC') {
            $cycleTable = 'cycle_c_s';
            $hourTable = 'hourcs';
            $dateTable = 'd_ate_c_s';
        }

        $data[$plane] = [
            'fresh' => [
                'cycles' => DB::table($cycleTable)->where('current', 0)->count(),
                'hours' => DB::table($hourTable)->where('current', 0)->count(),
                'dates' => DB::table($dateTable)->where('start', Carbon::today()->toDateString())->count(),
            ],
            'critical' => [
                'cycles' => DB::table($cycleTable)->whereRaw('max - current < 5')->count(),
                'hours' => DB::table($hourTable)->whereRaw('max - current < 50')->count(),
                'dates' => DB::table($dateTable)->where('max', '<', Carbon::now()->addWeek())->count(),
            ],
            'non_critical' => [
                'cycles' => DB::table($cycleTable)->whereRaw('max - current BETWEEN 5 AND 15')->count(),
                'hours' => DB::table($hourTable)->whereRaw('max - current BETWEEN 50 AND 100')->count(),
                'dates' => DB::table($dateTable)->whereBetween('max', [Carbon::now()->addWeek(), Carbon::now()->addDays(24)])->count(),
            ],
        ];
    }

    return response()->json($data);
}


}
