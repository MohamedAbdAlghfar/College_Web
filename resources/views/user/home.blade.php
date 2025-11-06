@extends('layouts.plain')

@section('content')
    <div class="header position-relative" 
         style="background-color: #2196f3; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        
        <div class="container text-center">
            {{-- Logo --}}
            <img src="/images/college logo.jpg" alt="Logo" class="rounded-circle mb-4" style="width: 100px; height: 100px;">

            {{-- Title --}}
            

            {{-- Navigation --}}
            <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 900px; background-color: #ffffff;">
                <div class="card-body py-4">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-3 mb-3">
                            <a href="/user/mycourses" class="btn btn-outline-primary w-100 py-2">
                                My Courses
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="/user/profile" class="btn btn-outline-primary w-100 py-2">
                                My Profile
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="/user/enrollCourses" class="btn btn-outline-primary w-100 py-2">
                                Enroll Courses
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="/user/mygrades" class="btn btn-outline-primary w-100 py-2">
                                My Grades
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Admin Dashboard Button --}}
            @if(auth()->user()->admin)
                <div class="mt-4">
                    <a href="{{ route('home') }}" class="btn btn-light text-primary fw-bold px-4 py-2">
                        Dashboard
                    </a>
                </div>
            @endif

            {{-- Logout --}}
            <div class="mt-5">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4 py-2 fw-bold">
                        Log out
                    </button>
                </form>
            </div>

            {{-- Footer --}}
            <div class="mt-5 text-light small">

                <p>Contact: <a href="mailto:mohamedabdodv@gmail.com" class="text-white">mohamedabdodv@gmail.com</a> (Business only)</p>
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
