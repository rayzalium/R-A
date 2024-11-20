<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $product = Product::all();
     $users = User::all();

     // Pass the users to a view or return as JSON
     return view('Admin.User.index', compact('users'));
     //$User = User::all();
       //return view('Admin.User.index', compact('User'));
    }

    public function trash()
    {
     $User = User::onlyTrashed()->get();
   // $cycleA = cycleA::withTrashed()->latest()->paginate(200);
       return view('Admin.User.trash', compact('User'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.create');
    }
    public function test()
    {
        return view('Admin.User.test');
    }

   /* public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
            'email'=>'required',
            'user_id'=>'required',
            'role'=>'required',
            'password'=>'required',

        ]);

        $User = User::create($request->all());
         return redirect()->route('User.index')
         ->with('success','User added successflly') ;
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return view('Admin.User.show', compact('User'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('Admin.User.edit', compact('users'))  ;
    }


/*
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'user_id'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);

        $users->update($request->all());
         return redirect()->route('User.index')
         ->with('success','User updated successflly') ;
    }*/
    public function update(Request $request, $id)
{
    $users = User::findOrFail($id);

    // Validate the incoming request data if needed
    $request->validate([
        'name' => 'required',
        'email' => 'required',
            'user_id'=>'required',
            'role'=>'required',
            'password'=>'required',
    ]);

    // Update the user's information
    $users->name = $request->input('name');
    $users->email = $request->input('email');
    $users->user_id = $request->input('user_id');
    $users->role = $request->input('role');
    $users->password = Hash::make($request->input('password'));
    // Update other fields as needed

    $users->save(); // Save the changes

    Auth::login($users);

    // Redirect back with a success message
    return redirect()->route('User.index')->with('success', 'User updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $users->delete();
        return redirect()->route('User.index')
        ->with('success','User deleted successflly') ;
    }


    public function softDelete($id)
    {

        $users = User::find($id)->delete();

        return redirect()->route('User.index')
        ->with('success','User deleted successflly') ;
    }

    public function  deleteForEver(  $id)
    {

        $users = User::onlyTrashed()->where('id' , $id)->forceDelete();

        return redirect()->route('User.trash')
        ->with('success','User deleted successflly') ;
    }


    public function backSoftDelete($id)
    {
   $users = User::onlyTrashed()->where('id' ,$id)->restore() ;
      //  dd($product);

        return redirect()->route('User.index')
        ->with('success','product back successfully') ;
    }
}
