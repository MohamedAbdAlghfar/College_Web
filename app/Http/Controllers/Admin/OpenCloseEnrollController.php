<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\course;

class OpenCloseEnrollController extends Controller
{
    
    public function openEnroll()
    {
     $courses = course::all();
     foreach($courses as $course)
     {
       $course->enrollment_status = 1 ; 
       $course->update();
     }
     return redirect('/admin/courses')->withStatus('Open Courses Enroll successfully.');

    }

    public function closeEnroll()
    {
     $courses = course::all();
     foreach($courses as $course)
     {
       $course->enrollment_status = 0 ; 
       $course->update();
     }
     return redirect('/admin/courses')->withStatus('Close Courses Enroll successfully.');

    }





}
