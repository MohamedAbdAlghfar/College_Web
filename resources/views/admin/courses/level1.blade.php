@extends('layouts.app', ['title' => __('Courses Level 1')])

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow border-0">
                
                {{-- Header --}}
                <div class="card-header border-0 bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0 fw-bold">{{ __('Courses Level 1') }}</h3>
                </div>

                {{-- Level Navigation --}}
                <div class="text-center py-3 bg-light border-bottom">
                    <a href="level1" class="mx-2 text-primary fw-bold">Level 1</a>
                    <a href="level2" class="mx-2 text-primary fw-bold">Level 2</a>
                    <a href="level3" class="mx-2 text-primary fw-bold">Level 3</a>
                    <a href="level4" class="mx-2 text-primary fw-bold">Level 4</a>
                    <a href="courses" class="mx-2 text-primary fw-bold">All Courses</a>
                </div> 

                {{-- Status Alert --}}
                <div class="col-12 mt-3">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                {{-- Course Grid --}}
                <div class="card-body">
                    <div class="row justify-content-start">
                        @foreach($course as $course)
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm border-0 rounded-4 h-100 d-flex flex-column" style="min-height: 420px;">
                                    
                                    {{-- Course Image --}}
                                    @if($course->photo)
                                        <img src="/images/{{ $course->photo->filename }}" 
                                            class="card-img-top rounded-top-4" 
                                            alt="Course Photo" 
                                            style="height: 180px; object-fit: cover;">
                                    @else
                                        <img src="/images/default.jpeg" 
                                            class="card-img-top rounded-top-4" 
                                            alt="Course Photo" 
                                            style="height: 180px; object-fit: cover;">
                                    @endif

                                    {{-- Card Body --}}
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <div>
                                            <h5 class="fw-bold text-primary mb-2">{{ \Str::limit($course->name, 50) }}</h5>
                                            <p class="mb-1"><strong>Level:</strong> {{ $course->level }}</p>
                                            <p class="mb-3"><strong>Points:</strong> {{ $course->point }}</p>
                                        </div>

                                        {{-- Buttons --}}
                                        <div class="mt-auto">
                                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline-primary btn-sm w-100 mb-2 fw-bold">Edit</a>
                                            <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-info btn-sm w-100 mb-2 fw-bold">Show</a>

                                            <form method="POST" action="{{ route('courses.destroy', $course) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm w-100 fw-bold">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Footer --}}
                <div class="card-footer py-4 d-flex justify-content-end">
                    {{-- Optional pagination --}}
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection
