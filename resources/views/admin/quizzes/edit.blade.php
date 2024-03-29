@extends('layouts.app', ['title' => __('quiz Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit quiz')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('quiz Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('courses.show', $quiz->course->id) }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('quizzes.update',$quiz) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')
                            <h6 class="heading-small text-muted mb-4">{{ __('quiz information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Quiz Name') }}</label>
                                    <input type="text" name="name" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ $quiz->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                               

                                <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-course_id">{{ __('Course Title') }}</label>
                                    
                                    <select name="course_id" required class="form-control">
                                        @foreach(\App\Models\course::orderBy('id', 'desc')->get() as $course)
                                        <option <?php if($quiz->course->id == $course->id) echo 'selected'; ?> value="{{ $course->id }}">{{ \Str::limit($course->name, 30) }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('course_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('course_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('UPDATE') }}</button>
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





















