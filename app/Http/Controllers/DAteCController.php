<?php

namespace App\Http\Controllers;

use App\Models\DAteC;
use Illuminate\Http\Request;

class DAteCController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $dateC = dateC::latest()->paginate();
       return view('Admin.dateC.index', compact('dateC'));
    }

    public function trash()
    {
     $dateC = dateC::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.dateC.trash', compact('dateC'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.dateC.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',

        ]);

        $dateC = dateC::create($request->all());
         return redirect()->route('dateC.index')
         ->with('success','dateC added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateC  $dateC
     * @return \Illuminate\Http\Response
     */
    public function show(dateC $dateC)
    {
        return view('Admin.dateC.show', compact('dateC'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateC  $dateC
     * @return \Illuminate\Http\Response
     */
    public function edit(dateC $dateC)
    {
        return view('Admin.dateC.edit', compact('dateC'))  ;
    }

    public function update(Request $request, dateC $dateC)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',
        ]);

        $dateC->update($request->all());
         return redirect()->route('dateC.index')
         ->with('success','dateC updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateC  $dateC
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateC $dateC)
    {
        $dateC->delete();
        return redirect()->route('dateC.index')
        ->with('success','dateC deleted successflly') ;
    }


    public function softDelete($id)
    {

        $dateC = dateC::find($id)->delete();

        return redirect()->route('dateC.index')
        ->with('success','dateC deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $dateC = dateC::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('dateC.trash')
        ->with('success','dateC deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $dateC = dateC::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('dateC.index')
        ->with('success','product back successfully') ;
    }
}
