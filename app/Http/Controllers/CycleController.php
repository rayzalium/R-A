<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cycleA;

class CycleController extends Controller
{
    public function incrementCycle(Request $request)
    {
        try {
            // Increment the `current_cycle` field for all records in the cycle_a_s table
            \DB::table('cycle_a_s')->increment('current');

            // Return a success response
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Log the error and return a failure response
            \Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

}

