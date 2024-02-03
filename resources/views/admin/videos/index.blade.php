<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
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

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%; /* Make the logo circular */
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
    </style>
</head>
<body> 

    <h3 align="center">VIDEOS</h3>
    <img src="/images/college logo.jpg" class="logo" alt="LOGO" style="width: 100px; height: 100px;">
    

    <div class="card-container">
        @foreach($videos as $video)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Video Name :: {{ $video->name }}</h5>
                    <p class="card-text">VIDEO LINK :: <a href="{{ $video->link }}" target="_blank">{{ $video->link }}</a></p>
                   
                    @if ($video->course)
    <p class="card-text">IN Course: {{ $video->course->name }}</p>
@else
    <p class="card-text">No course associated with this video</p>
@endif
                   
                    <!-- Add additional details as needed -->
                    <!-- Example: <p class="card-text">Some additional details</p> -->
                    <!-- Uncomment and customize the code below if you want to add an edit button -->
                    <!--
                    <a href="#" class="btn btn-primary">Edit</a>
                    -->
                    
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('home') }}" class="back-button">Back</a>
</body>
</html>
