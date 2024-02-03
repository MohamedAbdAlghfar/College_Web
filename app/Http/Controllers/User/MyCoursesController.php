<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;

class MyCoursesController extends Controller
{
    
    public function __construct()
    {

        $this->middleware('auth');
    }
    
    public function showMyCourses()
    {
     $user_id = auth()->user()->id;
     $user = User::find($user_id);
     $courses = $user->courses()->where('pass_course', 0)->get();
   
     return view('user.courses.mycourses',compact('courses','user'));
      //    return response()->json($courses);

    }

    public function showcourse($course_id)
    {
        $course = course::find($course_id);
        
        return view('user.courses.show',compact('course'));
      // return response()->json($course);
   
    }








}
