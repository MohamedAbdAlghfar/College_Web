<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;

class MyGradesController extends Controller
{
    public function showMyGrades()
    {
     $user_id = auth()->user()->id;
     $user = User::find($user_id);
     $courses = $user->courses()->whereIn('pass_course', [1, -1])->get();     
     return view('user.courses.mygrades',compact('courses','user'));
    }





}
