<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\photo;
use App\Models\course;
use App\Models\quiz;
use App\Models\video;
use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      
      
        $users_count = User::where('admin',0)->count(); 
        $admins_count = User::where('admin',1)->count(); 
        $courses_count = course::all()->count(); 
        $videos_count = video::all()->count();
      
      
      
        $user = Auth::user()->name;    
       $course = course::all();
       return view('admin.courses.index',compact('user','course','users_count','admins_count','courses_count','videos_count'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:150',
            'level' => 'required|integer|in:1,2,3,4',
            'link' => 'required',
            'point' => 'required|in:0,2,3,4',
            
        ];

        $this->validate($request, $rules);

        $course = course::create($request->merge(["level" => $request->get('level'),"point" => $request->get('point')])->all());

        if($course) {
            
            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $course->id,
                        'photoable_type' => 'App\Models\course',
                    ]);
                }
            }
            return redirect('/admin/courses')->withStatus('Course successfully created.');        }

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        return view('admin.courses.edit', compact('course')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,course $course)
    {
        $rules = [
            'name' => 'required|max:150',
            'level' => 'required|integer|in:1,2,3,4',
            'point' => 'required|in:0,2,3,4'
           // 'link' => 'required|url',
            
        ];

        $this->validate($request, $rules);

        $course->update($request->merge(["level" => $request->get('level'),"point" => $request->get('point')])->all());

        
            
            if($file = $request->file('image')) {

                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '_.'.$fileextension;

                if($file->move('images', $file_to_store)) {
                    if($course->photo) {
                        $photo = $course->photo;
    
                        // remove the old image
    
                        $filename = $photo->filename;
                        unlink('images/'.$filename);
    
                        $photo->filename = $file_to_store;
                        $photo->save();
                    }else {
                        photo::create([
                            'filename' => $file_to_store,
                            'photoable_id' => $course->id,
                            'photoable_type' => 'App\Models\course',
                        ]);
                    }
                }
            }
            return redirect('/admin/courses')->withStatus('Course successfully updated.');
        }



        





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        $course->deleted_by = Auth::user()->id;
        $course->videos()->delete();
        $course->quizzes()->delete();
        if($course->photo) {
            $filename = $course->photo->filename;
            unlink('images/'.$filename);
        }

       foreach($course->Users as $user){
       $user->total_hours = $user->total_hours - $course->point;
       $user->save();
       }

        // delete course photo
        $course->photo->delete();
        $course->delete();
        
        return redirect()->route('courses.index')->withStatus(__('Course successfully deleted.'));
    }

     
    public function showQuiz(course $course , quiz $quiz)
    {
        return view('admin.courses.showQuiz',compact('course','quiz'));
    }





}
