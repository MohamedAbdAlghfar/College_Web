<!doctype html>
<html>
    <body bgcolor="black" text="yellow">
         <h1 align="center"> {{ $quiz->name }} </h1> <a href="{{route('courses.show',$quiz->course) }}"> BACK </a>
       <br>  <a href="/admin/quizzes/{{ $quiz->id }}/questions/create"> Add question </a>
         <br><br><br><br>
    
          <?php $i = 1 ; ?>  
    @foreach($quiz->questions as $question)
        
    <h4> <?php echo $i ; ?>- {{ str_replace( '.', ' ?',  $question->title) }}  </h4>
    <h5> ( {{ str_replace( ' ',' - ' , $question->answers) }} ) </h5>
    <h5> RIGHT ANSWER IS :: "{{ $question->right_answer }}" </h5>
 
    <form action="{{ route('questions.destroy', $question) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('questions.edit', $question) }}">{{ __('Edit') }}</a>
                                                          <br>  <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this question?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form> 
 
    <hr>
    <?php $i++; ?>
    @endforeach

</body>


</html>