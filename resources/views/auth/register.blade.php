@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header position-relative" 
         style="background-color: #2196f3; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        
        <div class="container">
            <div class="row justify-content-center">
                {{-- Increased width from col-lg-5 to col-lg-6 --}}
                <div class="col-lg-6 col-md-8">
                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #ffffff;">
                        
                        {{-- Header --}}
                        <div class="card-header bg-transparent pb-4 text-center border-0">
                            <h3 class="text-primary fw-bold mb-3">{{ __('Create Account') }}</h3>
                            <p class="text-muted small mb-4">{{ __('Sign up to get started with College Web') }}</p>
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
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf

                                {{-- Name --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-hat-3 text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('  Name') }}" 
                                               type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-email-83 text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('  Email') }}" 
                                               type="email" name="email" value="{{ old('email') }}" required>
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
                                        <input class="form-control" placeholder="{{ __('  Password') }}" 
                                               type="password" name="password" required>
                                    </div>
                                </div>

                                {{-- Confirm Password --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-lock-circle-open text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('  Confirm Password') }}" 
                                               type="password" name="password_confirmation" required>
                                    </div>
                                </div>

                                {{-- Level --}}
                                <div class="form-group mb-4">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light">
                                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('  Level') }}" 
                                               type="number" name="level" required>
                                    </div>
                                </div>

                                {{-- Terms --}}
                                <div class="form-group d-flex align-items-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" id="terms" required>
                                    <label for="terms" class="form-check-label text-muted small mb-0">
                                        {{ __('I agree with the') }} <a href="#!" class="text-primary">{{ __('Privacy Policy') }}</a>
                                    </label>
                                </div>

                                {{-- Submit --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5 py-2">{{ __('Create account') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Footer Links --}}
                    <div class="text-center mt-4">
                        <small class="text-light">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="text-white fw-bold">
                                {{ __('Sign in') }}
                            </a>
                        </small>
                    </div>
                </div>
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
