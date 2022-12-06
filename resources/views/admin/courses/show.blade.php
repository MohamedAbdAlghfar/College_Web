<!doctype html>
<html>
   <head>
       <h1 align="center"> COURSE INFO.... </h1> 
   </head>
   <body bgcolor="#ffff00">
    <div  align="center">    @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo">
                                @else
                                <img  src="/images/default.jpeg" class="card-img-top" alt="Course Photo">
                                @endif </div><a href="{{route('courses.index') }}"> BACK </a>
<table width="100%">
    <td>
    <div align="LEFT" width="30%">
    <h3> NAME : {{ $course->name }} </h3>
    <h3> LEVEL : {{ $course->level }} </h3>
    <h3> NUBER OF VIDEOS : {{ count($course->videos) }} </h3> 
    <h3> NUBER OF QUIZZES : {{ count($course->quizzes) }} </h3>
    <h3> NUBER OF STUDENTS : {{ count($course->users) }} </h3>
   </div>
  </td>
    <td>
    <div align="left"width="70%">
 
  <h3 align="center"> VIDEOS     </h3>       
  <a href="/admin/courses/{{ $course->id }}/videos/create" class="btn btn-sm btn-primary">{{ __('New Video') }}</a>
<table class="table align-items-center table-flush" width = "100%" bgcolor="white">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($course->videos as $video)                                <tr>
                                    <td align="center">
                                      {{ $video->name }}</td>   
                                     <td align="center">
                                        <a href="#">{{ $video->link }}</a>
                                    </td>
                                    
                                   <!-- <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                        <a class="dropdown-item" href="">Edit</a>
                                                                                                </div>
                                        </div>
                                    </td>   -->
                             
 <td>  <form action="{{ route('videos.destroy', $video) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('videos.edit', $video) }}">{{ __('Edit') }}</a>
                                                          <br>  <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this video?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    </td>
                                </tr>
                                @endforeach
                                                        </tbody>
                    </table>

</div>
<td>
</table>



<h3 align="center"> QUIZZES </h3>
<a href="/admin/courses/{{ $course->id }}/quizzes/create" class="btn btn-sm btn-primary">{{ __('New Quiz') }}</a>
<div align="center">

<table class="table align-items-center table-flush" width = "100%" bgcolor="white">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">No.questions</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($course->quizzes as $quiz)                                <tr>
                                    <td align="center">
                                     <a href="{{ route('quizzes.show',$quiz) }}"> {{ $quiz->name }}</a> </td>   
                                      @if($quiz->questions)
                                        <td align="center">{{ count($quiz->questions) }}</td>
                                        @endif
                                    
                                   <!-- <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                        <a class="dropdown-item" href="">Edit</a>
                                                                                                </div>
                                        </div>
                                    </td>   -->
                             
 <td>  <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('quizzes.edit', $quiz) }}">{{ __('Edit') }}</a>
                                                          <br>  <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this quiz?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    </td>
                                </tr>
                                @endforeach
                                                        </tbody>
                    </table>

</div>
<td>
</table>

</div>

   </body>
</html>