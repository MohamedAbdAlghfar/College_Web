<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\photo;
use App\Models\course;
use App\Models\video;
use Illuminate\Support\Facades\Auth;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = video::all();
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.videos.create');
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
            'name' => 'required|min:2|max:100',
            'link' => 'required',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        $video = Video::create($request->all());

        if($video) {
            return redirect('/admin/courses')->withStatus('Video successfully created.');
        }else {
            return redirect('/admin/videos/create')->withStatus('Something Wrong, Try again.');
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
    public function edit(video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,video $video)
    {
        $rules = [
            'name' => 'required|min:2|max:100',
            'link' => 'required',
            'course_id' => 'required|integer',
        ];

        $this->validate($request, $rules);

        if($video->update($request->all())) {
            return redirect('/admin/courses')->withStatus('Video successfully updated.');
        }else {
            return redirect('/admin/videos/'.$video->id.'/edit')->withStatus('Something wrong, Try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        $video->delete();
        return redirect('/admin/courses')->withStatus('Video successfully deleted.');
    }
}
