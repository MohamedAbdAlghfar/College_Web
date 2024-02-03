<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;

class EnrollCoursesController extends Controller
{
    public function showCourses()
    {
     $user_id = auth()->user()->id;
     $user = User::find($user_id);
     $courses = Course::where('enrollment_status', 1)
     ->where(function ($query) use ($user) {
         $query->whereHas('users', function ($subQuery) use ($user) {
             $subQuery->where('user_id', $user->id)
                 ->whereNotIn('pass_course', [0, 1]);
         })->orWhereDoesntHave('users', function ($subQuery) use ($user) {
             $subQuery->where('user_id', $user->id);
         });
     })
     ->get();
          return view('user.courses.enrollCourses',compact('courses','user'));
      //    return response()->json($courses);

    }


    public function Enroll($course_id)
    {
     $user_id = auth()->user()->id;
     $user = User::find($user_id);
     $course = Course::find($course_id);
     if($user->gpa > 2 && $user->total_hours + $course->point <= 18 ){
        $user->courses()->attach($course, [
            'pass_course' => 0,
            'grade' => null
        ]);
        $user->total_hours = $user->total_hours + $course->point ;
        $user->update();   
    }
     elseif($user->gpa <= 2 && $user->total_hours + $course->point <= 15 ){
        $user->courses()->attach($course, [
            'pass_course' => 0,
            'grade' => null
        ]);
        $user->total_hours = $user->total_hours + $course->point ;
        $user->update(); 
    }
     else{
        return redirect('/user/enrollCourses')->withStatus('You cannot enroll more courses.');   
     }

        return redirect('/user/enrollCourses')->withStatus('Courses Enroll successfully.');    

      

    }






}
