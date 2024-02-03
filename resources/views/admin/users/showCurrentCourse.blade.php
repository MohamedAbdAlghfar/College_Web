<html lang="en">
<head>
<style type="text/css">
.back-button {
  background-color: red;
  color: white;
  border: 1px solid black;
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
}
.back-button {
  background-color: black;
  color: white;
  border: 1px solid black;
  padding: 5px 10px;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<h3> STUDENT NAME:: {{ $user->name }} </h3>
<h4> STUDENT LEVEL:: {{ $user->level }} </h4>
<table width = 100%  border = 1px>
    <thead>
        <tr>
            <th>COURSE IMAGE</th>    
            <th>COURSE NAME</th>
            <th>POINT</th>
            <th>LEVEL</th>
            <th>GRADE</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
        <td width = 18%>                            @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo" width = 200px hight = 200px>
                                @else
                                <img  src="/images/default.jpeg" class="card-img-top" alt="Course Photo">
                                @endif</td>
            <td align = "center">{{ $course->name }}</td>
            <td align = "center">{{ $course->point }}</td>
            <td align = "center">{{ $course->level }}</td>
            <td>
            <form method="post" action="{{ route('ShowCurrentCourse.storeUserGrade',  ['course_id' => $course, 'user_id' => $user]) }}" autocomplete="off">
                            @csrf
                            <label for="grade">grade:</label>
		                    <input type="number" id="grade" name="grade" >
                            <button type="submit" id="submit">SAVE</button>
                    </form> 
       </td>


        </tr>        
        @endforeach 
    </tbody>
</table>
<br>
<div align = "center"><a href="{{ route('users.index') }}" class="back-button">Back</a></div> 
</body>
</html>



















