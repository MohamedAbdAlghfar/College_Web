<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Page background and general font */
        body {
            background-color: #2196f3;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header section */
        .header {
            text-align: center;
            color: white;
            padding: 50px 20px 30px 20px;
        }

        .header h1 {
            font-size: 38px;
            font-weight: bold;
            margin: 0;
        }

        /* Main form container */
        .container {
            width: 85%;
            max-width: 800px;
            background-color: white;
            margin: 40px auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        h3 {
            font-size: 20px;
            color: #2196f3;
            margin-bottom: 15px;
            border-bottom: 2px solid #2196f3;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control-label {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 12px;
            font-size: 16px;
            transition: border 0.3s ease;
        }

        .form-control:focus {
            border-color: #2196f3;
            outline: none;
            box-shadow: 0 0 5px rgba(33, 150, 243, 0.3);
        }

        /* Buttons */
        .btn-success {
            background-color: #2196f3;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #1976d2;
            box-shadow: 0 4px 10px rgba(25, 118, 210, 0.3);
        }

        /* Back button */
        .back-button {
            display: inline-block;
            background-color: white;
            color: #2196f3;
            border: 2px solid #2196f3;
            border-radius: 10px;
            padding: 10px 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            margin: 30px auto;
        }

        .back-button:hover {
            background-color: #1976d2;
            color: white;
        }

        /* Section spacing */
        .section-divider {
            height: 2px;
            background-color: #ddd;
            margin: 40px 0;
        }

        footer {
            text-align: center;
            color: white;
            margin-top: 50px;
            padding-bottom: 30px;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Edit Profile</h1>
    </div>

    <div class="container">

        {{-- User Info Form --}}
        <form method="post" action="{{ route('userprofile.update') }}" autocomplete="off">
            @csrf
            @method('put')

            <h3>User Information</h3>

            <div class="form-group">
                <label class="form-control-label" for="input-name">Name</label>
                <input type="text" name="name" id="input-name"
                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       placeholder="Enter your name"
                       value="{{ old('name', auth()->user()->name) }}" required>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label class="form-control-label" for="input-email">Email</label>
                <input type="email" name="email" id="input-email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       placeholder="Enter your email"
                       value="{{ old('email', auth()->user()->email) }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="text-center">
                <button type="submit" class="btn-success">Save Changes</button>
            </div>
        </form>

        <div class="section-divider"></div>

        {{-- Password Change Form --}}
        <form method="post" action="{{ route('userprofile.password') }}" autocomplete="off">
            @csrf
            @method('put')

            <h3>Change Password</h3>

            <div class="form-group">
                <label class="form-control-label" for="input-current-password">Current Password</label>
                <input type="password" name="old_password" id="input-current-password"
                       class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                       placeholder="Enter your current password" required>

                @if ($errors->has('old_password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label class="form-control-label" for="input-password">New Password</label>
                <input type="password" name="password" id="input-password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="Enter a new password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label class="form-control-label" for="input-password-confirmation">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="input-password-confirmation"
                       class="form-control" placeholder="Confirm your new password" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn-success">Change Password</button>
            </div>
        </form>
    </div>

    <div style="text-align: center;">
        <a href="{{ route('home.user') }}" class="back-button">← Back</a>
    </div>

    

</body>
</html>
