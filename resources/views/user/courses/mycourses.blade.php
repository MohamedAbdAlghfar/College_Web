@extends('layouts.plain')

@section('content')
    <div class="header position-relative"
         style="background-color: #2196f3; min-height: 100vh; padding-top: 60px; padding-bottom: 60px;">
        
        <div class="container text-center">
            {{-- Page Title --}}
            <h1 class="text-white fw-bold mb-5" style="font-family: monospace;">My Courses</h1>

            {{-- Course Grid --}}
            <div class="row justify-content-center">
                @foreach($courses as $course)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column" style="min-height: 420px;">
                            
                            {{-- Course Image --}}
                            @if($course->photo)
                                <img src="/images/{{ $course->photo->filename }}" 
                                     class="card-img-top" 
                                     alt="Course Photo" 
                                     style="height: 180px; object-fit: cover;">
                            @else
                                <img src="/images/default.jpeg" 
                                     class="card-img-top" 
                                     alt="Course Photo" 
                                     style="height: 180px; object-fit: cover;">
                            @endif

                            {{-- Card Body --}}
                            <div class="card-body d-flex flex-column text-start justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-primary mb-2">{{ \Str::limit($course->name, 50) }}</h5>
                                    <p class="mb-1"><strong>Level:</strong> {{ $course->level }}</p>
                                    <p class="mb-3"><strong>Point:</strong> {{ $course->point }}</p>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('showMyCourse.showcourse', $course) }}" 
                                       class="btn btn-outline-primary w-100 fw-bold mt-2">
                                        Show
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Back Button --}}
            <div class="mt-5">
                <a href="{{ route('home.user') }}" class="btn btn-light text-primary fw-bold px-4 py-2">
                    ← Back
                </a>
            </div>

            {{-- Footer --}}
            <div class="mt-5 text-light small">
          
                <p>Contact: 
                    <a href="mailto:mohamedabdodv@gmail.com" class="text-white">mohamedabdodv@gmail.com</a> 
                    (Business only) 
                </p>
            </div>
        </div>

        {{-- Wave Decoration --}}
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                <path fill="#ffffff" d="M0,64L80,53.3C160,43,320,21,480,16C640,11,800,21,960,37.3C1120,53,1280,75,1360,85.3L1440,96L1440,120L0,120Z"></path>
            </svg>
        </div>
    </div>
@endsection
