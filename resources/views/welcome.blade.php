@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header position-relative" 
         style="background-color: #2196f3; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="p-5 rounded-4 shadow-lg bg-white">
                        <h1 class="fw-bold text-primary mb-3">{{ __('Welcome to College Web.') }}</h1>
                     

                  
                    </div>
                </div>
            </div>
        </div> 

        {{-- Wave decoration --}}
        <div class="position-absolute bottom-0 start-0 w-100">
            <svg viewBox="0 0 1440 120" xmlns="http://www.w3.org/2000/svg">
                <path fill="#ffffff" d="M0,64L80,53.3C160,43,320,21,480,16C640,11,800,21,960,37.3C1120,53,1280,75,1360,85.3L1440,96L1440,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
