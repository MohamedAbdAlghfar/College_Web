<!doctype html>
   <body bgcolor="yellow">


   <h3 align="center"> VIDEOS     </h3>       
   <a href="{{route('home') }}"> BACK </a>
<table class="table align-items-center table-flush" width = "100%" bgcolor="white" >
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Link</th>
                                <th scope="col">Course</th>
                                
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)                                <tr>
                                    <td align="center">
                                      {{ $video->name }}</td>   
                                     <td align="center">
                                        <a href="#">{{ $video->link }}</a>
                                    </td>
                                    <td align="center">
                                      {{ $video->course->name }}</td>
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
                             
                                </tr>
                                @endforeach
                                                        </tbody>
                    </table>

</div>
<td>
</table>









  </body>

</html>