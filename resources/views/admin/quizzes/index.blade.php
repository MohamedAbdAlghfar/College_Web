<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <style>
        body {
            background-color: #157DEC;
        }
        .card-container {
            display: flex; 
            flex-wrap: wrap;
            justify-content: space-around; 
            padding: 20px;
        }
        .card {
            width: 300px;
            margin: 10px;
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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

.logo {
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Make the logo circular */
        }

    </style>
</head>
<body>

    <h3 align="center">QUIZZES</h3>
    <img src="/images/college logo.jpg" class="logo" alt="LOGO" style="width: 100px; height: 100px;">    

    <div class="card-container">
        @foreach($quizzes as $quiz)
            <div class="card">
                <h5>Name: <a href="{{ route('quizzes.show', $quiz) }}">{{ $quiz->name }}</a></h5>
                @if($quiz->questions)
                    <p>No. Questions: {{ count($quiz->questions) }}</p>
                @endif 
                @if ($quiz->course)
    <p>Course: {{ $quiz->course->name }}</p>
@else
    <p>No course associated with this quiz</p>
@endif
                <!-- Add additional details as needed -->
                <!-- Example: <p>Some additional details</p> -->
                <!-- Uncomment and customize the code below if you want to add an edit button -->
                <!--
                <a href="#" class="btn btn-primary">Edit</a>
                -->
            </div>
        @endforeach
    </div>
    <a href="{{ route('home') }}" class="back-button">Back</a>
</body>
</html>
