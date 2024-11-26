<?php

namespace App\Http\Controllers;

use App\Models\hourB;
use Illuminate\Http\Request;

class HourBController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $hourb = hourb::latest()->paginate();
       return view('Admin.hourb.index', compact('hourb'));
    }

    public function trash()
    {
     $hourb = hourb::onlyTrashed()->get();
   // $hourb = hourb::withTrashed()->latest()->paginate(200);
       return view('Admin.hourb.trash', compact('hourb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.hourb.create');
    }
    public function test()
    {
        return view('hourb.test');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',

        ]);

        $hourb = hourb::create($request->all());
         return redirect()->route('hourb.index')
         ->with('success','hour added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\hourb  $hourb
     * @return \Illuminate\Http\Response
     */
    public function show(hourb $hourb)
    {
        return view('Admin.hourb.show', compact('hourb'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hourb  $hourb
     * @return \Illuminate\Http\Response
     */
    public function edit(hourb $hourb)
    {
        return view('Admin.hourb.edit', compact('hourb'))  ;
    }

    public function update(Request $request, hourb $hourb)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'current'=>'required',
            'max'=>'required',
        ]);

        $hourb->update($request->all());
         return redirect()->route('hourb.index')
         ->with('success','hourb updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hourb  $hourb
     * @return \Illuminate\Http\Response
     */
    public function destroy(hourb $hourb)
    {
        $hourb->delete();
        return redirect()->route('hourb.index')
        ->with('success','hourb deleted successflly') ;
    }


    public function softDelete($id)
    {

        $hourb = hourb::find($id)->delete();

        return redirect()->route('hourb.index')
        ->with('success','hour deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $hourb = hourb::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('hourb.trash')
        ->with('success','hour deleted successflly') ;
    }



    public function backSoftDelete($id)
    {
   $hourb = hourb::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('hourb.index')
        ->with('success','product back successfully') ;
    }

}
