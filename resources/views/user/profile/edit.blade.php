<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style type="text/css">
        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
        }

        .card-profile {
            border-radius: 15px;
        }

        .card-header {
            background-color: #737CA1;
            border-bottom: 1px solid #ddd;
        }

        .card-body,
        .card-footer {
            background-color: #737CA1;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 15px 15px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control-label {
            font-size: 0.875rem;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 0.75rem;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 0.75rem 1.5rem;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .back-button {
            background-color: red;
            color: white;
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
        }

        h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        h3 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <!-- Profile Image (if needed) -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <h1 class="mb-0">{{ __('Edit Profile') }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- User Information Form -->
                        <form method="post" action="{{ route('userprofile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h3 class="heading-small text-muted mb-4">{{ __('User Information') }}</h3>

                            <!-- Name Field -->
                            <div class="form-group">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Save Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                            </div>
                        </form>

                        <hr class="my-4" />

                        <!-- Password Change Form -->
                        <form method="post" action="{{ route('userprofile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h3 class="heading-small text-muted mb-4">{{ __('Password') }}</h3>

                            <!-- Current Password Field -->
                            <div class="form-group">
                                <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                @if ($errors->has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- New Password Field -->
                            <div class="form-group">
                                <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Confirm New Password Field -->
                            <div class="form-group">
                                <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                            </div>

                            <!-- Change Password Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">{{ __('Change Password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <br><br><br>
        <a href="{{ route('home.user') }}" class="back-button"> BACK </a>

        <!-- Footer Section -->
        @include('layouts.footers.auth')
    </div>

</body>

</html>
