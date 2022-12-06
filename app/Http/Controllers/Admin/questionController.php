<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\question;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class questionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(question $question)
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,question $questionss)
    {
        
        $rules = [
            'title' => 'required|min:3',
            'answers'=> 'required|min:10',
            'right_answer' => 'required|min:5',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $question = question::create($request->all());
        
        if(question::create($request->all())) {
             $quis_id = $request->get('quiz_id');
             $question->quizzes()->sync($quis_id);
           
            return redirect('/admin/courses')->withStatus('Question successfully created.');
        }else {
            return redirect('/admin/questions/create')->withStatus('Something Wrong, Try again.');
        }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(question $question)
    {
        return view('admin.questions.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,question $question)
    {
        $rules = [
            'title' => 'required|min:3',
            'answers'=> 'required|min:10',
            'right_answer' => 'required|min:5',
            'quiz_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $question->update($request->all());
        
        if($question->update($request->all())) {
             $quis_id = $request->get('quiz_id');
             $question->quizzes()->sync($quis_id);
           
            return redirect('/admin/courses')->withStatus('Question successfully updated.');
        }else {
            return redirect('/admin/questions/edit')->withStatus('Something Wrong, Try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question)
    {
        $question->delete();
        return redirect('/admin/courses')->withStatus('Question successfully deleted.'); 
    }
}
