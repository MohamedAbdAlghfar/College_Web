@extends('layouts.app', ['title' => __('Courses Management')])

@section('content')
    @include('layouts.headers.cards')

   
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Courses') }}</h3>
                                </div>
                            </div>
                         
                           <table align="right"> 
                         <div align="right">
                         <tr>  
                     <td>   <div class="col-4 text-right">
                                <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary">{{ __('Add course') }}</a>
                            </div> </td>
                       <td>     <div class="col-4 text-right">
                                <a href="{{ route('videos.create') }}" class="btn btn-sm btn-primary">{{ __('Add video') }}</a>
                            </div>  </td>

                         <td>
                            <div class="col-4 text-right">
                                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary">{{ __('Add quiz') }}</a>
                            </div>  </td>
                            <td> <div class="col-4 text-right">
                                <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary">{{ __('Add question') }}</a>
                            </div> </td>
                        
                            <td>   <div class="col-4 text-right">
                                <a href="/courses/deleted" class="btn btn-sm btn-primary">{{ __('course Del By') }}</a>
                            </div> </td>
                        
                            <td>
    <div class="col-4 text-right">  
        <form method="POST" action="{{ route('OpenCloseEnroll.openEnroll') }}">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <button type="submit" class="btn btn-sm btn-primary">{{ __('Open enrollCourse') }}</button>
        </form>
    </div>
</td>


<td>
    <div class="col-4 text-right">
        <form method="POST" action="{{ route('OpenCloseEnroll.closeEnroll') }}">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <button type="submit" class="btn btn-sm btn-primary">{{ __('Close enrollCourse') }}</button>
        </form>
    </div>
</td>

                        </tr>
                            </tr>
                        </div>




</table>
                    </div>
                    
                    
                    <table width = "100%" cellspacing = "10px" class = "first" ALIGN="right" >
<tr>
<th><a href = "level1"> LEVEL 1 </a></th>
<th><a href = "level2"> LEVEL 2 </a></th>
<th><a href = "level3"> LEVEL 3 </a></th>
<th><a href = "level4"> LEVEL 4 </a></th>
<th><a href = "courses"> All Courses </a></th>
</tr>
</table><hr>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    

                    <div class="row">
                        @foreach($course as $course)
                        <div class="col-sm-3">
                            <div class="card">
                                
                            @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo" style="width: 100px; height: 100px;"> 
                                @else
                                <img  src="/images/default.jpeg" class="card-img-top" alt="Course Photo" style="width: 100px; height: 100px;">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($course->name, 100) }}</h5>

                                    
                                    <form  method="POST" action="{{ route('courses.destroy', $course) }}">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('courses.show', $course) }}" class="btn btn-info btn-sm">show</a>

                                        <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletecourse">
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    
                    
                    
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                          
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         
        @include('layouts.footers.auth')
    </div>
   
    @endsection
