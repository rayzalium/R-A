<?php

namespace App\Http\Controllers;

use App\Models\DAteA;
use Illuminate\Http\Request;

class DAteAController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $dateA = dateA::latest()->paginate();
       return view('Admin.dateA.index', compact('dateA'));
    }

    public function trash()
    {
     $dateA = dateA::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.dateA.trash', compact('dateA'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.dateA.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',

        ]);

        $dateA = dateA::create($request->all());
         return redirect()->route('dateA.index')
         ->with('success','dateA added successflly') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateA  $dateA
     * @return \Illuminate\Http\Response
     */
    public function show(dateA $dateA)
    {
        return view('Admin.dateA.show', compact('dateA'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateA  $dateA
     * @return \Illuminate\Http\Response
     */
    public function edit(dateA $dateA)
    {
        return view('Admin.dateA.edit', compact('dateA'))  ;
    }

    public function update(Request $request, dateA $dateA)
    {
        $request->validate([
            'name'=>'required',
            'serial'=>'required',
            'start'=>'required',
            'max'=>'required',
        ]);

        $dateA->update($request->all());
         return redirect()->route('dateA.index')
         ->with('success','dateA updated successflly') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateA  $dateA
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateA $dateA)
    {
        $dateA->delete();
        return redirect()->route('dateA.index')
        ->with('success','dateA deleted successflly') ;
    }


    public function softDelete($id)
    {

        $dateA = dateA::find($id)->delete();

        return redirect()->route('dateA.index')
        ->with('success','dateA deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $dateA = dateA::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('dateA.trash')
        ->with('success','dateA deleted successflly') ;
    }




    public function backSoftDelete($id)
    {
   $dateA = dateA::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('dateA.index')
        ->with('success','product back successfully') ;
    }
}
