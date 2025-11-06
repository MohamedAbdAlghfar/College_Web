<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Info</title>
    <style>
        body {
            background-color: #2196f3;
            color: #333;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 50px 20px 30px 20px;
        }

        .header h1 {
            color: white;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Course Info Container */
        .course-info {
            background-color: white;
            width: 80%;
            max-width: 900px;
            margin: 0 auto;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            padding: 30px;
            text-align: left;
        }

        .course-info img {
            width: 100%;
            height: 350px;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 25px;
        }

        .course-info h3 {
            margin: 10px 0;
            font-weight: normal;
        }

        /* Video Cards */
        h2 {
            text-align: center;
            color: white;
            margin-top: 50px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            background-color: white;
            width: 300px;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            min-height: 180px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card a {
            color: #2196f3;
            text-decoration: none;
            word-break: break-all;
        }

        .back-button {
            display: block;
            width: fit-content;
            margin: 40px auto;
            background-color: white;
            color: #2196f3;
            border: 2px solid #2196f3;
            padding: 10px 25px;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #1976d2;
            color: white;
        }

        footer {
            text-align: center;
            color: white;
            margin-top: 50px;
            padding-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="/images/college logo.jpg" class="logo" alt="LOGO">
        <h1>Course Information</h1>
    </div>

    <div class="course-info">
        {{-- Course Image --}}
        @if($course->photo)
            <img src="/images/{{ $course->photo->filename }}" alt="Course Photo">
        @else
            <img src="/images/default.jpeg" alt="Course Photo">
        @endif

        {{-- Course Details --}}
        <h3><strong>Name:</strong> {{ $course->name }}</h3>
        <h3><strong>Level:</strong> {{ $course->level }}</h3>
        <h3><strong>Number of Videos:</strong> {{ count($course->videos) }}</h3>
        <h3><strong>Number of Quizzes:</strong> {{ count($course->quizzes) }}</h3>
        <h3><strong>Number of Students:</strong> {{ count($course->users) }}</h3>
    </div>

    {{-- Videos Section --}}
    <h2>Videos</h2>
    <div class="card-container">
        @foreach($course->videos as $video)
            <div class="card">
                <h3>{{ $video->name }}</h3>
                <p><strong>Link:</strong> <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a></p>
            </div>
        @endforeach
    </div>

    {{-- Back Button --}}
    <a href="{{ route('showMyCourse.showMyCourses') }}" class="back-button">← Back</a>

    {{-- Footer --}}
    <footer>

        <p>Contact: <a href="mailto:mohamedabdodv@gmail.com" style="color: white;">mohamedabdodv@gmail.com</a></p>
    </footer>

</body>
</html>
