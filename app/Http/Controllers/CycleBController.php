<?php

namespace App\Http\Controllers;

use App\Models\cycleB;
use Illuminate\Http\Request;

class CycleBController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $cycleB = cycleB::latest()->paginate();
       return view('Admin.cycleB.index', compact('cycleB'));
    }

    public function trash()
    {
     $cycleB = cycleB::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.cycleB.trash', compact('cycleB'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.cycleB.create');
    }
    public function test()
    {
        return view('cycleB.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $cycleB = cycleB::create($request->all());
         return redirect()->route('cycleB.index')
         ->with('success','cycleB added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cycleB  $cycleB
     * @return \Illuminate\Http\Response
     */
    public function show(cycleB $cycleB)
    {
        return view('Admin.cycleB.show', compact('cycleB'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cycleB  $cycleB
     * @return \Illuminate\Http\Response
     */
    public function edit(cycleB $cycleB)
    {
        return view('Admin.cycleB.edit', compact('cycleB'))  ;
    }

    public function update(Request $request, cycleB $cycleB)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $cycleB->update($request->all());
         return redirect()->route('cycleB.index')
         ->with('success','cycleB updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cycleB  $cycleB
     * @return \Illuminate\Http\Response
     */
    public function destroy(cycleB $cycleB)
    {
        $cycleB->delete();
        return redirect()->route('cycleB.index')
        ->with('success','cycleB deleted successflly') ;
    }


    public function softDelete($id)
    {

        $cycleB = cycleB::find($id)->delete();

        return redirect()->route('cycleB.index')
        ->with('success','cycleB deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $cycleB = cycleB::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('cycleB.trash')
        ->with('success','cycleB deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $cycleB = cycleB::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('cycleB.index')
        ->with('success','product back successfully') ;
    }
}
