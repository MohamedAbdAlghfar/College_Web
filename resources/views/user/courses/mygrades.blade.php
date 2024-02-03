<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    <style type="text/css">
        body {
            background-color: #737CA1;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
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

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .col-sm-3 {
            flex: 0 0 calc(25% - 20px);
            margin: 10px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h5 {
            font-size: 1rem;
            margin-bottom: 5px;
        }

        hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 0;
            border-top: 1px solid #ddd;
        }

        .passed {
            color: #00CC66;
        }

        .failed {
            color: brown;
        }
    </style>
</head>

<body>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h1>..Grades</h1>
                            </div>
                        </div>
                    </div>

                    <h2>.GPA :: {{ $user->gpa }}</h2>

                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-sm-3">
                            <div class="card">
                                @if($course->photo)
                                <img src="/images/{{$course->photo->filename}}" class="card-img-top" alt="Course Photo">
                                @else
                                <img src="/images/default.jpeg" class="card-img-top" alt="Course Photo">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ \Str::limit($course->name, 100) }}</h5>
                                    <h5 class="card-title">LEVEL: {{ $course->level }}</h5>
                                    <h5 class="card-title">POINT: {{ $course->point }}</h5>
                                    <h5 class="card-title">GRADE: {{ $course->pivot->grade }}</h5>

                                    @if($course->pivot->grade >= 60)
                                    <h5 class="passed">Passed</h5>
                                    @else
                                    <h5 class="failed">Failed</h5>
                                    @endif

                                    <br><hr>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <br><br><br>
                    <a href="{{route('home.user')}}" class="back-button"> BACK </a>

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
