@extends('layouts.app', ['title' => __('question Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Question')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Question Management') }}</h3>   
                            </div>
                            <div class="col-4 text-right"> 
                            @foreach(\App\Models\Quiz::orderBy('id', 'desc')->get() as $quiz)
                               @if($question->quizzes->contains($quiz))
                                   <a href="{{ route('quizzes.show',$quiz->id) }}" class="btn btn-sm btn-primary">{{ __('Back to  ') }} {{  $quiz->name }} {{ __('Quiz') }}</a><br><br>
                               @endif 
                           @endforeach
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('questions.update',$question) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <h6 class="heading-small text-muted mb-4">{{ __('Question information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Question Name') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ $question->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>




                                <div>
                                <label class="form-control-label" for="choice1">{{ __('Choice1') }}</label>
                                    <input type="text" name="choice1" id="choice1" class="form-control form-control-alternative{{ $errors->has('choice1') ? ' is-invalid' : '' }}" placeholder="{{ __('choice1') }}" value="{{ $question->choice1 }}" required autofocus>
                             </div>

                             <div>
                                <label class="form-control-label" for="choice2">{{ __('Choice2') }}</label>
                                    <input type="text" name="choice2" id="choice2" class="form-control form-control-alternative{{ $errors->has('choice2') ? ' is-invalid' : '' }}" placeholder="{{ __('choice2') }}" value="{{ $question->choice2 }}" required autofocus>
                             </div>

                             <div>
                                <label class="form-control-label" for="choice3">{{ __('Choice3') }}</label>
                                    <input type="text" name="choice3" id="choice3" class="form-control form-control-alternative{{ $errors->has('choice3') ? ' is-invalid' : '' }}" placeholder="{{ __('choice3') }}" value="{{ $question->choice3 }}"  autofocus>
                             </div>

                             <div>
                                <label class="form-control-label" for="choice4">{{ __('Choice4') }}</label>
                                    <input type="text" name="choice4" id="choice4" class="form-control form-control-alternative{{ $errors->has('choice4') ? ' is-invalid' : '' }}" placeholder="{{ __('choice4') }}" value="{{ $question->choice4 }}"  autofocus>
                             </div>





                             <div>
                                <label class="form-control-label" for="input-title">{{ __('Right Answer') }}</label>
                                    <input type="text" name="right_answer" id="input-title" class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" placeholder="{{ __('right_answer') }}" value="{{ $question->right_answer }}" required autofocus>
                             </div>









                                
                             <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-quiz_id">{{ __('Quiz Title') }}</label>
                                    
                                    <select name="quiz_id" required class="form-control">
    @foreach(\App\Models\Quiz::orderBy('id', 'desc')->get() as $quiz)
        <option {{ $question->quizzes->contains($quiz) ? 'selected' : '' }} value="{{ $quiz->id }}">
            {{ \Str::limit($quiz->name, 30) }}
        </option>
    @endforeach
</select>     

                                    @if ($errors->has('quiz_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quiz_id') }}</strong>
                                        </span>
                                    @endif

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection




































