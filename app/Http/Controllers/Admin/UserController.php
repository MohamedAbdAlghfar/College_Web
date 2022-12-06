<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;
use App\Models\video;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
       
       
        $users_count = User::where('admin',0)->count(); 
        $admins_count = User::where('admin',1)->count(); 
        $courses_count = course::all()->count();
        $videos_count = video::all()->count();
       
        $users = User::where('admin',0)->orderBy('id','desc')->paginate(15);
        $user = Auth::user()->name;
        return view('admin.users.index',['users' => $users],compact('user','users_count','admins_count','courses_count','videos_count'));
    }

    public function create()
    {
        return view('admin.users.create'); 
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user')); 
    }

public function store(UserRequest $request, User $model)
    { 
        $model->create($request->merge(['password' => Hash::make($request->get('password')), "level" => $request->get('level')])->all());

        return redirect()->route('users.index')->withStatus(__('User successfully created.'));
    }

    public function destroy(User  $user) 
    {
        $user->delete();
        
        return redirect()->route('users.index')->withStatus(__('User successfully deleted.'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|min:5|max:30',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
        ];
 
        $this->validate($request, $rules);

        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('users.index')->withStatus(__('User successfully updated.'));
    }

}
