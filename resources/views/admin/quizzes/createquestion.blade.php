@extends('layouts.app', ['title' => __('Question Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Question')])   

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
                                <a href="{{ route('courses.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('questions.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Question information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Question') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('quiz_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-quiz_id">{{ __('Quiz Title') }}</label>
                                    
                                    <select name="quiz_id" required class="form-control">
                                        <option value="{{ $quiz->id }}">{{ $quiz->name}}</option>
                                    </select>

                                    @if ($errors->has('quiz_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quiz_id') }}</strong>
                                        </span>
                                    @endif
                                </div> 

                                <h6 class="heading-small text-muted mb-4">{{ __('Choices') }}</h6>

                                
                                    <div class="form-group">
                                        <label class="form-control-label" for="choice1">{{ __('Choice1') }}</label>
                                        <input type="text" name="choice1" id="choice1" class="form-control" placeholder="Choice1" required>
                                    </div>
                               
                                    <div class="form-group">
                                        <label class="form-control-label" for="choice2">{{ __('Choice2') }}</label>
                                        <input type="text" name="choice2" id="choice2" class="form-control" placeholder="Choice2" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="choice3">{{ __('Choice3') }}</label>
                                        <input type="text" name="choice3" id="choice3" class="form-control" placeholder="Choice3" >
                                    </div> 

                                    <div class="form-group">
                                        <label class="form-control-label" for="choice4">{{ __('Choice4') }}</label>
                                        <input type="text" name="choice4" id="choice4" class="form-control" placeholder="Choice4" >
                                    </div>


                                <div class="form-group{{ $errors->has('right_answer') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-right_answer">{{ __('Right Answer') }}</label>
                                    <input type="text" name="right_answer" id="input-right_answer" class="form-control form-control-alternative{{ $errors->has('right_answer') ? ' is-invalid' : '' }}" placeholder="{{ __('Right Answer') }}" value="{{ old('right_answer') }}" required autofocus>

                                    @if ($errors->has('right_answer'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('right_answer') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
