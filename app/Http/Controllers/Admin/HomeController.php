<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\course;
use App\Models\video;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       $users_count = User::where('admin',0)->count(); 
       $admins_count = User::where('admin',1)->count(); 
       $courses_count = course::all()->count(); 
       $videos_count = video::all()->count();
        return view('admin.dashboard',compact('users_count','admins_count','courses_count','videos_count'));
    }
}
