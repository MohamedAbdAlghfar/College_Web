<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\quiz;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class quizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $quizzes = quiz::all();
    //     return view('admin.quizzes.index',compact('quizzes'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quizzes.create');
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
            'name' => 'required|min:3|max:50',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $quiz = quiz::create($request->all());

        if($quiz) {
            return redirect('/admin/courses')->withStatus('Quiz successfully created.');
        }else {
            return redirect('/admin/quizzes/create')->withStatus('Something wrong, Try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz)
    {
        return view('admin.quizzes.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(quiz $quiz)
    {
        return view('admin.quizzes.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,quiz $quiz)
    {
        $rules = [
            'name' => 'required|min:3|max:50',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($quiz->update($request->all())) {
            return redirect('/admin/courses')->withStatus('Quiz successfully updated.');
        }else {
            return redirect('/admin/quizzes/'.$quiz->id.'/edit')->withStatus('Something wrong, Try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, quiz $quiz)
    {
        $courseId = $request->input('course_id');
        $quiz->questions()->delete();
        $quiz->delete();
        return redirect("/admin/courses/$courseId")->withStatus('Quiz successfully deleted.');
    }
}
