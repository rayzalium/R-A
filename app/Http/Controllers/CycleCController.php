<?php

namespace App\Http\Controllers;

use App\Models\cycleC;
use Illuminate\Http\Request;

class CycleCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $cycleC = cycleC::latest()->paginate();
       return view('Admin.cycleC.index', compact('cycleC'));
    }

    public function trash()
    {
     $cycleC = cycleC::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.cycleC.trash', compact('cycleC'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.cycleC.create');
    }
    public function test()
    {
        return view('Admin.cycleC.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $cycleC = cycleC::create($request->all());
         return redirect()->route('cycleC.index')
         ->with('success','cycleC added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cycleC  $cycleC
     * @return \Illuminate\Http\Response
     */
    public function show(cycleC $cycleC)
    {
        return view('Admin.cycleC.show', compact('cycleC'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cycleC  $cycleC
     * @return \Illuminate\Http\Response
     */
    public function edit(cycleC $cycleC)
    {
        return view('Admin.cycleC.edit', compact('cycleC'))  ;
    }

    public function update(Request $request, cycleC $cycleC)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $cycleC->update($request->all());
         return redirect()->route('cycleC.index')
         ->with('success','cycleC updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cycleC  $cycleC
     * @return \Illuminate\Http\Response
     */
    public function destroy(cycleC $cycleC)
    {
        $cycleC->delete();
        return redirect()->route('cycleC.index')
        ->with('success','cycleC deleted successflly') ;
    }


    public function softDelete($id)
    {

        $cycleC = cycleC::find($id)->delete();

        return redirect()->route('cycleC.index')
        ->with('success','cycleC deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $cycleC = cycleC::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('cycleC.trash')
        ->with('success','cycleC deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $cycleC = cycleC::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('cycleC.index')
        ->with('success','part back successfully') ;
    }
}
