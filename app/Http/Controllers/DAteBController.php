<?php

namespace App\Http\Controllers;

use App\Models\DAteB;
use Illuminate\Http\Request;

class DAteBController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $dateB = dateB::latest()->paginate();
       return view('Admin.dateB.index', compact('dateB'));
    }

    public function trash()
    {
     $dateB = dateB::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.dateB.trash', compact('dateB'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.dateB.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',

        ]);

        $dateB = dateB::create($request->all());
         return redirect()->route('dateB.index')
         ->with('success','dateB added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateB  $dateB
     * @return \Illuminate\Http\Response
     */
    public function show(dateB $dateB)
    {
        return view('Admin.dateB.show', compact('dateB'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateB  $dateB
     * @return \Illuminate\Http\Response
     */
    public function edit(dateB $dateB)
    {
        return view('Admin.dateB.edit', compact('dateB'))  ;
    }

    public function update(Request $request, dateB $dateB)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',
        ]);

        $dateB->update($request->all());
         return redirect()->route('dateB.index')
         ->with('success','dateB updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateB  $dateB
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateB $dateB)
    {
        $dateB->delete();
        return redirect()->route('dateB.index')
        ->with('success','dateB deleted successflly') ;
    }


    public function softDelete($id)
    {

        $dateB = dateB::find($id)->delete();

        return redirect()->route('dateB.index')
        ->with('success','dateB deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $dateB = dateB::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('dateB.trash')
        ->with('success','dateB deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $dateB = dateB::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('dateB.index')
        ->with('success','product back successfully') ;
    }
}
