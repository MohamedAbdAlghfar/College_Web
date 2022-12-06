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
                                <h3 class="mb-0">{{ __('Courses Level 4') }}</h3>
                            </div>
                            
                        </div>
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
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo">
                                @else
                                <img  src="/images/default.jpeg" class="card-img-top" alt="Course Photo">
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
