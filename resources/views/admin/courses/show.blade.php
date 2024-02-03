<!doctype html>
<html>
   <head>

   <style>
        body {
            background-color: #157DEC;
        }
        h1, h3 {
            text-align: center;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around; 
            padding: 20px;
        }
        .card {
            width: 300px;
            margin: 10px;
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .back-button {
  background-color: red; 
  color: white;
  border: 1px solid black;
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
}
.logo {
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Make the logo circular */
        }

    </style>


       <h1 align="center"> COURSE INFO.... </h1> 
       <img src="/images/college logo.jpg" class="logo" alt="LOGO" style="width: 100px; height: 100px;"> 
   </head>
   <body>
    <div  align="center">    @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo"style="width: 300px; height: 300px;">
                                @else
                                <img  src="/images/default.jpeg" class="card-img-top" alt="Course Photo"style="width: 300px; height: 300px;">
                                @endif </div>
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
    <td>
</table>
 
         
  
  <h1>VIDEOS</h1>
  <a href="/admin/courses/{{ $course->id }}/videos/create" class="back-button">{{ __('New Video') }}</a>
    

    <div class="card-container">
        @foreach($course->videos as $video)
            <div class="card">
                <h3>VIDEO Name: {{ $video->name }}</h3>
                <p>VIDEO Link: <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a></p>
                <form action="{{ route('videos.destroy', $video) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('videos.edit', $video) }}" class="back-button">{{ __('Edit') }}</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this video?") }}') ? this.parentElement.submit() : ''">
                        {{ __('Delete') }}
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>




<h1 align="center"> QUIZZES </h1>
<a href="/admin/courses/{{ $course->id }}/quizzes/create" class="back-button">{{ __('New Quiz') }}</a>
<div class="card-container">
        @foreach($course->quizzes as $quiz)
            <div class="card">
                <h3>QUIZ Name: <a href="{{ route('courses.showQuiz', ['course' => $course->id, 'quiz' => $quiz->id]) }}"> {{ $quiz->name }}</a></h3>
                <p>No. of Questions: {{ count($quiz->questions) }}</p>
                <form action="{{ route('quizzes.destroy', $quiz) }}" method="post">
                    @csrf
                    @method('delete')
                    <a href="{{ route('quizzes.edit', $quiz) }}" class="back-button">{{ __('Edit') }}</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this quiz?") }}') ? this.parentElement.submit() : ''">
                        {{ __('Delete') }}
                    </button>
                </form>
            </div>
        @endforeach
    </div>
<br><br><br>
<a href="{{route('courses.index')}}" class="back-button">Back</a>
   </body>
</html>