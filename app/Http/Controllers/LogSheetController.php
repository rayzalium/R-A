<?php

namespace App\Http\Controllers;

use App\Models\LogSheet;
use Illuminate\Http\Request;
use App\Http\Controllers\CycleController;
use App\Models\Cycle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class LogSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $LogSheet = LogSheet::latest();

       return view('Pilot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Default to the first available cycle, or handle if none exists
        return view('Pilot.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_of_plane' => 'required|string',
            'no_of_flight' => 'required|integer',
            'srart_date' => 'required|date',
            'end_date' => 'required|date',
            'take_of_time' => 'required|date_format:H:i',
            'landing_time' => 'required|date_format:H:i',
            'deprature' => 'required|string',
            'arrival' => 'required|string',
        ]);
/*
        // Calculate the time difference between takeoff and landing times
        $takeoffTime = Carbon::parse($validatedData['take_of_time']);
        $landingTime = Carbon::parse($validatedData['landing_time']);
        $hours = $takeoffTime->diffInHours($landingTime);
        $minutes = $takeoffTime->diffInMinutes($landingTime) % 60;
        $timeDifference = $hours . '.' . str_pad($minutes, 2, '0', STR_PAD_LEFT);*/

        // Save the LogSheet data
        // Assuming you have a LogSheet model
        LogSheet::create($validatedData);

        $takeOffTime = Carbon::createFromFormat('H:i', $request->take_of_time);
$landingTime = Carbon::createFromFormat('H:i', $request->landing_time);

// Calculate the total hours and minutes difference
$hours = $landingTime->diffInHours($takeOffTime);
$minutes = $landingTime->diffInMinutes($takeOffTime) % 60;

// Format the difference as "hours.minutes" (e.g., "1.30" for 1 hour and 30 minutes)
$difference = $hours + ($minutes / 100); // This will give a result like 1.30 or 1.05

// Now, use $difference as needed in your increments

         // Calculate time difference between `take_of_time` and `landing_time`
        // $takeOffTime = Carbon::createFromFormat('H:i', $request->take_of_time);
         //$landingTime = Carbon::createFromFormat('H:i', $request->landing_time);

         //$difference = $landingTime->diffInHours($takeOffTime);

        if ($request->name_of_plane === 'AFA320') {
            DB::table('cycle_a_s')->increment('current', 1);
            DB::table('hours')->increment('current', $difference);
        }
        elseif ($request->name_of_plane === 'AFB320') {
            // Increment `current` in `cycle_b_s` by 1
            DB::table('cycle_b_s')->increment('current', 1);
            // Increment `current` in `hour_b_s` by the time difference
            DB::table('hour_b_s')->increment('current', $difference);

        } elseif ($request->name_of_plane === 'AFC320') {
            // Increment `current` in `cycle_c_s` by 1
            DB::table('cycle_c_s')->increment('current', 1);
            // Increment `current` in `hourcs` by the time difference
            DB::table('hourcs')->increment('current', $difference);
        }



        // Increment the `current` column in `hours` table by the difference


        return response()->json(['success' => true, 'message' => 'LogSheet saved successfully!']);


        // Return JSON response with success message and timeDifference to trigger AJAX increment
      /*  return response()->json([
            'success' => true,
            'message' => 'LogSheet saved successfully.',
            'timeDifference' => $timeDifference
        ]);return response()->json(['message' => 'LogSheet saved successfully']);*/
    }

/*
    public function updateCyclesAndHours(Request $request)
{
    $name_of_plane = $request->input('name_of_plane');
    $takeoffTime = $request->input('takeoff_time');
    $landingTime = $request->input('landing_time');

    // Calculate the time difference in hours
    $takeoff = Carbon::parse($takeoffTime);
    $landing = Carbon::parse($landingTime);
    $timeDifference = $landing->diffInHours($takeoff);

    if ($name_of_plane == 'AFA320') {
        // Update CycleA and HourA current
        Log::info('Incrementing CycleA and HourA');
        DB::table('cycle_a_s')->increment('current', 1);
        DB::table('hours')->increment('current', $timeDifference);
    } elseif ($name_of_plane == 'AFB320') {
        // Update CycleB and HourB
        Log::info('Incrementing CycleB and HourB');
        DB::table('cycle_b_s')->increment('current', 1);
        DB::table('hour_b_s')->increment('current', $timeDifference);
    } elseif ($name_of_plane == 'AFC320') {
        // Update CycleC and HourC
        Log::info('Incrementing CycleC and HourC');
        DB::table('cycle_c_s')->increment('current', 1);
        DB::table('hourcs')->increment('current', $timeDifference);
    }

    return response()->json(['message' => 'Cycles and Hours updated successfully']);
}

/*
    public function updateHourA(Request $request)
{
    $timeDifference = $request->input('timeDifference');
    DB::table('hours')->increment('current', $timeDifference);

    return response()->json(['success' => true]);
}

public function updateHourB(Request $request)
{
    $timeDifference = $request->input('timeDifference');
    DB::table('hour_b_s')->increment('current', $timeDifference);

    return response()->json(['success' => true]);
}

public function updateHourC(Request $request)
{
    $timeDifference = $request->input('timeDifference');
    DB::table('hourcs')->increment('current', $timeDifference);

    return response()->json(['success' => true]);
}
/*
    public function updateHourA(Request $request)
    {
        $timeDifference = $request->input('timeDifference');
        try {
            DB::table('hours')->increment('current', $timeDifference);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to update HourA: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update HourA.']);
        }
    }
    public function updateHourB(Request $request)
    {
        $timeDifference = $request->input('timeDifference');
        try {
            DB::table('hour_b_s')->increment('current', $timeDifference);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to update HourB: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update HourB.']);
        }
    }
    public function updateHourC(Request $request)
    {
        $timeDifference = $request->input('timeDifference');
        try {
            DB::table('hourcs')->increment('current', $timeDifference);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to update HourC: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to update HourC.']);
        }
    }

    public function incrementCycleA(Request $request)
    {
        try {
            DB::table('cycle_a_s')->increment('current', 1);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to increment CycleA: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to increment CycleA.']);
        }
    }
    public function incrementCycleB(Request $request)
    {
        try {
            DB::table('cycle_b_s')->increment('current', 1);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to increment CycleB: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to increment CycleB.']);
        }
    }
    public function incrementCycleC(Request $request)
    {
        try {
            DB::table('cycle_c_s')->increment('current', 1);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error("Failed to increment CycleC: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to increment CycleC.']);
        }
    }
*/

    /**
     * Display the specified resource.
     */
    public function show(LogSheet $logSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogSheet $logSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LogSheet $logSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogSheet $logSheet)
    {
        //
    }
}
