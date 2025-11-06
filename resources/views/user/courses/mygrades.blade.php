@extends('layouts.plain')

@section('content')
    <div class="header position-relative" style="background-color: #2196f3;">
        <div class="container text-center py-5 position-relative" style="z-index: 2;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="p-5 rounded-4 shadow-lg bg-white">
                        <h1 class="fw-bold text-primary mb-4">Grades</h1>
                        <h4 class="mb-5 text-dark">GPA: <strong>{{ $user->gpa }}</strong></h4>

                        <div class="row justify-content-center">
                            @foreach($courses as $course)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex">
                                    <div class="card border-0 shadow-sm flex-fill d-flex flex-column">
                                        @if($course->photo)
                                            <img src="/images/{{$course->photo->filename}}" class="card-img-top"
                                                 alt="Course Photo" style="height: 150px; object-fit: cover;">
                                        @else
                                            <img src="/images/default.jpeg" class="card-img-top"
                                                 alt="Default Image" style="height: 150px; object-fit: cover;">
                                        @endif

                                        <div class="card-body d-flex flex-column">
                                            <h5 class="fw-bold text-primary">{{ \Str::limit($course->name, 80) }}</h5>
                                            <p class="mb-1"><strong>Level:</strong> {{ $course->level }}</p>
                                            <p class="mb-1"><strong>Point:</strong> {{ $course->point }}</p>
                                            <p class="mb-1"><strong>Grade:</strong> {{ $course->pivot->grade }}</p>

                                            @if($course->pivot->grade >= 60)
                                                <p class="text-success fw-bold mt-2">Passed</p>
                                            @else
                                                <p class="text-danger fw-bold mt-2">Failed</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a href="{{ route('home.user') }}" class="btn btn-danger mt-4">Back</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Decorative wave at the very bottom --}}
        <div class="position-absolute bottom-0 start-0 w-100" style="z-index: 1;">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                <path fill="#ffffff"
                      d="M0,64L80,53.3C160,43,320,21,480,16C640,11,800,21,960,37.3C1120,53,1280,75,1360,85.3L1440,96L1440,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
