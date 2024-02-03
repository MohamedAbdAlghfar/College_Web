<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;

class ShowCurrentCourseController extends Controller
{
    
    public function showUserCurrentCourses($user_id) 
    {
    $user = User::find($user_id);
    $courses = $user->courses()->where('pass_course', 0)->get();
   
    return view('admin.users.showCurrentCourse',compact('courses','user'));
     //    return response()->json($courses);
            
    }

    public function storeUserGrade( Request $request, $course_id,$user_id)
    {
    $course = course::find($course_id);
    $user = User::find($user_id);
            
    if ($course && $user) {
        
        if($request->grade < 60)
          $pass_course = -1 ;
        else
          $pass_course = 1 ; 

        $user->courses()->updateExistingPivot($course->id, ['pass_course' => $pass_course , 'grade' => $request->grade]);

        // Optionally, you can retrieve the updated pivot record
        $pivotRecord = $user->courses()->where('course_id', $course->id)->first()->pivot;
        $user->total_hours = $user->total_hours - $course->point ;
        $sumGrades = $user->courses()->whereIn('pass_course', [1, -1])->sum('grade'); 
        $countCourses = $user->courses()->whereIn('pass_course', [1, -1])->count();
        $userGPA = ($sumGrades / ($countCourses * 100)) * 4;
        $user->gpa = $userGPA;
        $user->update();
        // Return a response or perform additional actions
   
       return redirect()->route('ShowCurrentCourse.showUserCurrentCourses',$user_id)->withStatus(__('grade successfully Added.'));
   //  return response()->json(['message' => 'grade successfully Added.']);
    }




    }

 //        for admin      //


 public function showAdminCurrentCourses($user_id) 
 {
 $user = User::find($user_id);
 $courses = $user->courses()->where('pass_course', 0)->get();

 return view('admin.admins.showCurrentCourse',compact('courses','user'));
  //    return response()->json($courses);
         
 }

 public function storeAdminGrade( Request $request, $course_id,$user_id)
 {
 $course = course::find($course_id);
 $user = User::find($user_id);
         
 if ($course && $user) {
     
     if($request->grade < 60)
       $pass_course = -1 ;
     else
       $pass_course = 1 ;  

     $user->courses()->updateExistingPivot($course->id, ['pass_course' => $pass_course , 'grade' => $request->grade]);

     // Optionally, you can retrieve the updated pivot record
     $pivotRecord = $user->courses()->where('course_id', $course->id)->first()->pivot;
     $user->total_hours = $user->total_hours - $course->point ;
     $sumGrades = $user->courses()->whereIn('pass_course', [1, -1])->sum('grade'); 
     $countCourses = $user->courses()->whereIn('pass_course', [1, -1])->count();
     $userGPA = ($sumGrades / ($countCourses * 100)) * 4;
     $user->gpa = $userGPA;
     $user->update();
     // Return a response or perform additional actions

    return redirect()->route('ShowCurrentCourse.showAdminCurrentCourses',$user_id)->withStatus(__('grade successfully Added.'));
//  return response()->json(['message' => 'grade successfully Added.']);
 }




 }
















}
