<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Series;
use App\User;
use App\Role;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //$request->session()->flash('success','testing success message');
        //$request->session()->flash('warning','testing warning message');
        //$request->session()->flash('error','testing error success message');
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if(Gate::denies('edit-users')){
            return view('dashboard')->with('series',$user->series);
        }else{
            $users = User::all();
            return view('admin.users.index')->with('users', $users);
        }

       
    }
    public function welcome()
    {
        $featuredSeries = Series::take(3)->latest()->get();
        return view('welcome',compact('featuredSeries'));
    }

    
}
