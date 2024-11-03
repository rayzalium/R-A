<?php

namespace App\Http\Controllers;

use App\Models\AFA;
use Illuminate\Http\Request;

class AFAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $part = AFA::latest()->paginate(4);
        return view('part.index',compact('part'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('part.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serialNo'=>'required',
            'startDate'=>'required',
            'limitOfDays'=>'required',
            'counterOfCycles'=>'required',
            'limitOfCycles'=>'required',
            'limitOfHours'=>'required',
            'counterOfHours'=>'required',
        ]);
        $part = AFA::create($request->all());
        return  redirect()->route('parts.index')->with('success','part added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(AFA $aFA)
    {
        return view('parts.show',compact('part') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AFA $aFA)
    {
        return view('part.edit', compact('aFA'));
    }

    public function update(Request $request, AFA $aFA)
    {
        $request->validate([
            'name'=>'required',
            'serialNo'=>'required',
            'startDate'=>'required',
            'limitOfDays'=>'required',
            'counterOfCycles'=>'required',
            'limitOfCycles'=>'required',
            'limitOfHours'=>'required',
            'counterOfHours'=>'required',
        ]);
        $part = AFA::update($request->all());
        return  redirect()->route('parts.index')
        ->with('success','part updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AFA $aFA)
    {
        $part->delete();
        return  redirect()->route('parts.index')
        ->with('success','part deleted successfully');
    }
}
