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

        $logSheets = LogSheet::all();

    // Pass the records to the view
    return view('Admin.LogSheet.index', compact('logSheets'));
    }

    public function trash()
    {
     $LogSheet = LogSheet::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.LogSheet.trash', compact('LogSheet'));
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



        return response()->json(['success' => true, 'message' => 'LogSheet saved successfully!']);

    }


    /**
     * Display the specified resource.
     */
    public function show(LogSheet $logSheet)
    {
        return view('Admin.LogSheet.show', compact('logSheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // LogSheet $logSheet
    public function edit($id)
    {
        //return view('Admin.LogSheet.edit', compact('LogSheet'));
        // Retrieve the specific LogSheet record by its ID
    $logSheet = LogSheet::findOrFail($id);

    // Pass the record to the edit view
    return view('Admin.LogSheet.edit', compact('logSheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LogSheet $logSheet)
    {
        logger('Update method triggered for LogSheet ID:', ['id' => $logSheet->id]);

        // Validate the input data
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

        logger('Validated data:', $validatedData);

        try {
            // Parse and calculate the time difference
            $takeoffTime = Carbon::createFromFormat('H:i', $validatedData['take_of_time']);
            $landingTime = Carbon::createFromFormat('H:i', $validatedData['landing_time']);
            $hours = $takeoffTime->diffInHours($landingTime);
            $minutes = $takeoffTime->diffInMinutes($landingTime) % 60;
            $timeDifference = $hours . '.' . str_pad($minutes, 2, '0', STR_PAD_LEFT);

            logger('Time difference calculated:', ['timeDifference' => $timeDifference]);
        } catch (\Exception $e) {
            logger('Failed to calculate time difference:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Invalid time format in input data.']);
        }

        // Update the existing record fields
        try {
            $logSheet->update($validatedData); // Use the update method directly on the model

            logger('LogSheet updated successfully:', $logSheet->toArray());
        } catch (\Exception $e) {
            logger('Failed to update LogSheet:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to update logsheet: ' . $e->getMessage()]);
        }

        return redirect()->route('LogSheet.index')
            ->with('success', 'Logsheet updated successfully!');
    }









    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogSheet $logSheet)
    {
        $LogSheet->delete();
        return redirect()->route('LogSheet.index')
        ->with('success','LogSheet deleted successflly') ;
    }

    public function softDelete($id)
    {

        $LogSheet = LogSheet::find($id)->delete();

        return redirect()->route('LogSheet.index')
        ->with('success','LogSheet deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $LogSheet = LogSheet::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('LogSheet.trash')
        ->with('success','LogSheet deleted successflly') ;
    }

    public function backSoftDelete($id)
    {
   $LogSheet = LogSheet::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('LogSheet.index')
        ->with('success','LogSheet back successfully') ;
    }
}
