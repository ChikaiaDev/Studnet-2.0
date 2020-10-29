<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Series;
use App\Role;
use Illuminate\Http\Request;
use Gate;

class UserController extends Controller
{


    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    { 
        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }
        // dd($user);
       $roles = Role::all();
       return view('admin.users.edit')->with(['user'=>$user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
            //dd($request);
            $user->roles()->sync($request->roles);
            $user->name = $request->name;
            $user->email = $request->email;

            if($user->save()){
                $request->session()->flash('success',$user->name.' successfuly updated!!');
            }else{
                $request->session()->flash('error','There seems to be a problem');
            }

            

            return redirect()->route('admin.users.index');
    }
 
    public function show(Request $request, User $user){
        $series = Series::all();
        return view('admin.users.show')->with(['user'=>$user,'series'=>$series]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        //dd($user);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
