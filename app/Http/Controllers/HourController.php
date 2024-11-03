<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $hour = hour::latest()->paginate();
       return view('Admin.hour.index', compact('hour'));
    }

    public function trash()
    {
     $hour = hour::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.hour.trash', compact('hour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.hour.create');
    }
    public function test()
    {
        return view('hour.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $hour = hour::create($request->all());
         return redirect()->route('hour.index')
         ->with('success','hour added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function show(hour $hour)
    {
        return view('Admin.hour.show', compact('hour'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function edit(hour $hour)
    {
        return view('Admin.hour.edit', compact('hour'))  ;
    }

    public function update(Request $request, hour $hour)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $hour->update($request->all());
         return redirect()->route('hour.index')
         ->with('success','hour updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hour  $hour
     * @return \Illuminate\Http\Response
     */
    public function destroy(hour $hour)
    {
        $hour->delete();
        return redirect()->route('hour.index')
        ->with('success','hour deleted successflly') ;
    }


    public function softDelete($id)
    {

        $hour = hour::find($id)->delete();

        return redirect()->route('hour.index')
        ->with('success','hour deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $hour = hour::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('hour.trash')
        ->with('success','hour deleted successflly') ;
    }



    public function backSoftDelete($id)
    {
   $hour = hour::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('hour.index')
        ->with('success','product back successfully') ;
    }

}
