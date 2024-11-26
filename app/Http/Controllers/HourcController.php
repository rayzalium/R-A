<?php

namespace App\Http\Controllers;

use App\Models\hourc;
use Illuminate\Http\Request;

class HourcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $hourc = hourc::latest()->paginate();
       return view('Admin.hourc.index', compact('hourc'));
    }

    public function trash()
    {
     $hourc = hourc::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.hourc.trash', compact('hourc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.hourc.create');
    }
    public function test()
    {
        return view('Admin.hourc.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $hourc = hourc::create($request->all());
         return redirect()->route('hourc.index')
         ->with('success','hour added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hourc  $hourc
     * @return \Illuminate\Http\Response
     */
    public function show(hourc $hourc)
    {
        return view('Admin.hourc.show', compact('hourc'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hourc  $hourc
     * @return \Illuminate\Http\Response
     */
    public function edit(hourc $hourc)
    {
        return view('Admin.hourc.edit', compact('hourc'))  ;
    }

    public function update(Request $request, hourc $hourc)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $hourc->update($request->all());
         return redirect()->route('hourc.index')
         ->with('success','hourc updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hourc  $hourc
     * @return \Illuminate\Http\Response
     */
    public function destroy(hourc $hourc)
    {
        $hourc->delete();
        return redirect()->route('hourc.index')
        ->with('success','hour deleted successflly') ;
    }


    public function softDelete($id)
    {

        $hourc = hourc::find($id)->delete();

        return redirect()->route('hourc.index')
        ->with('success','hour deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $hourc = hourc::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('hourc.trash')
        ->with('success','hour deleted successflly') ;
    }



    public function backSoftDelete($id)
    {
   $hourc = hourc::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('hourc.index')
        ->with('success','part back successfully') ;
    }

}
