<?php

namespace App\Http\Controllers;

use App\Models\cycleA;
use Illuminate\Http\Request;

class CycleAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $cycleA = cycleA::latest()->paginate();
       return view('Admin.cycleA.index', compact('cycleA'));
    }

    public function trash()
    {
     $cycleA = cycleA::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.cycleA.trash', compact('cycleA'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.cycleA.create');
    }
    public function test()
    {
        return view('Admin.cycleA.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $cycleA = cycleA::create($request->all());
         return redirect()->route('cycleA.index')
         ->with('success','cycleA added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cycleA  $cycleA
     * @return \Illuminate\Http\Response
     */
    public function show(cycleA $cycleA)
    {
        return view('Admin.cycleA.show', compact('cycleA'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cycleA  $cycleA
     * @return \Illuminate\Http\Response
     */
    public function edit(cycleA $cycleA)
    {
        return view('Admin.cycleA.edit', compact('cycleA'))  ;
    }

    public function update(Request $request, cycleA $cycleA)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $cycleA->update($request->all());
         return redirect()->route('cycleA.index')
         ->with('success','cycleA updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cycleA  $cycleA
     * @return \Illuminate\Http\Response
     */
    public function destroy(cycleA $cycleA)
    {
        $cycleA->delete();
        return redirect()->route('cycleA.index')
        ->with('success','cycleA deleted successflly') ;
    }


    public function softDelete($id)
    {

        $cycleA = cycleA::find($id)->delete();

        return redirect()->route('cycleA.index')
        ->with('success','cycleA deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $cycleA = cycleA::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('cycleA.trash')
        ->with('success','cycleA deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $cycleA = cycleA::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('cycleA.index')
        ->with('success','product back successfully') ;
    }


}
