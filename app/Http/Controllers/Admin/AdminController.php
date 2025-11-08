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
class AdminController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */

   //public function __construct() {
    //$this->middleware('owner');
      //  }

  public function index()
    {
        
        $users_count = User::where('admin',0)->count(); 
       $admins_count = User::where('admin',1)->count(); 
       $courses_count = course::all()->count();
       $videos_count = video::all()->count();

        $auth_id = Auth::user()->id;
        $users = User::where('admin', 1)->whereNotIn('id', [$auth_id] )->orderBy('id', 'desc')->paginate(15);
        $user = Auth::user()->name;
        return view('admin.admins.index',['users' => $users],compact('user','users_count','admins_count','courses_count','videos_count'));
    }

    public function create()
    {
        return view('admin.admins.create'); 
    }

    
public function store(UserRequest $request, User $model)
{ 
        $rules = [
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'level' => 'required|integer|in:1,2,3,4',  
        ];

        $this->validate($request, $rules);
    $model->create($request->merge(['password' => Hash::make($request->get('password')), "admin" => 1, "level" => $request->get('level')])->all());
    
    return redirect()->route('admins.index')->withStatus(__('Admin successfully created.'));
}

public function edit(User $admin)
    { 
        return view('admin.admins.edit', compact('admin')); 
    }

    public function destroy(User  $admin)
    {
        $admin->delete();
        
        return redirect()->route('admins.index')->withStatus(__('Admin successfully deleted.'));
    }

    public function update(Request $request, User $admin)
{
    $rules = [
            'name' => 'required|string|min:2|max:30',
            'email' => 'required|email',
            'password' => 'nullable|min:6|confirmed',
            'level' => 'required|integer|in:1,2,3,4',
    ];

    $this->validate($request, $rules); 

    $data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'admin' => $request->input('admin'),
        'level' => $request->input('level'),
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->input('password'));
    }

    $admin->update($data);

    return redirect()->route('admins.index')->withStatus(__('Admin successfully updated.'));
}

}
