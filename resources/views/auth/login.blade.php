@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header position-relative" 
         style="background-color: #2196f3; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #ffffff;">
                        
                        {{-- Header --}}
                        <div class="card-header bg-transparent pb-4 text-center border-0">
                            <h3 class="text-primary fw-bold mb-3">{{ __('Welcome Back') }}</h3>
                            <p class="text-muted small mb-4">{{ __('Sign in to continue to College Web') }}</p>
                            <div class="btn-wrapper">
                                <a href="#" class="btn btn-outline-primary btn-icon mx-1">
                                    <span class="btn-inner--icon">
                                        <img src="{{ asset('argon') }}/img/courses/common/github.svg" height="20">
                                    </span>
                                    <span class="btn-inner--text">{{ __('Github') }}</span>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-icon mx-1">
                                    <span class="btn-inner--icon">
                                        <img src="{{ asset('argon') }}/img/courses/common/google.svg" height="20">
                                    </span>
                                    <span class="btn-inner--text">{{ __('Google') }}</span>
                                </a>
                            </div>
                        </div>

                        {{-- Form --}}
                        <div class="card-body px-lg-5 py-lg-5">
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf

                                {{-- Email --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-email-83 text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('  Email') }}" 
                                               type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-lock-circle-open text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" name="password" placeholder="{{ __('  Password') }}" type="password" required>
                                    </div>
                                </div>

                                {{-- Remember + Forgot --}}
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label text-muted" for="customCheckLogin">{{ __('Remember me') }}</label>
                                    </div>
         
                                </div>

                                {{-- Submit --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5 py-2">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Footer Links --}}
                    <div class="text-center mt-4">
                        <small class="text-light">
                            {{ __("Don't have an account?") }}
                            <a href="{{ route('register') }}" class="text-white fw-bold">
                                {{ __('Create one') }}
                            </a>
                        </small>
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
@endsection
