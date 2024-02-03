<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;
use Illuminate\Support\Facades\Auth;
class CourseDelByController extends Controller
{
    public function showDeletedCourse($courseId)
    {
        $course = course::withTrashed()->find($courseId);
        $admin = User::find($course->deleted_by);
    
        // Access admin information
        $adminName = $admin->name;
        $adminEmail = $admin->email;
    
        // Pass the admin information to the view or perform any other desired actions
        return view('admin.courses.deletedCourse', compact('course', 'adminName', 'adminEmail'));
    }
    
    
    public function DeletedCourseIds()
    {
        $deletedCourseIds = Course::onlyTrashed() 
        ->whereNotNull('deleted_by')->get();
    
    // Access the IDs
    
      
     // return response()->json($deletedCourseIds);
      return view('admin.courses.deletedCourseID', compact('deletedCourseIds'));
    } 



}
