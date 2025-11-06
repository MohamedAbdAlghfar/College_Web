<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Information</title>
    <style>
        body {
            background-color: #2196f3;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Center Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* White Card */
        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            padding: 40px 60px;
            text-align: center;
            width: 90%;
            max-width: 500px;
        }

        h1 {
            color: #2196f3;
            font-size: 22px;
            margin: 15px 0;
        }

        /* Buttons */
        .button {
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            margin-top: 25px;
            text-decoration: none;
            display: inline-block;
        }

        .button:hover {
            background-color: #1976d2;
        }

        .back-button {
            background-color: white;
            color: #2196f3;
            border: 2px solid #2196f3;
        }

        .back-button:hover {
            background-color: #1976d2;
            color: white;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h1><b>Name:</b> {{ $adminName }}</h1> 
            <h1><b>Email:</b> {{ $adminEmail }}</h1>

            <a href="/courses/deleted" class="button back-button">Back</a>
        </div>
    </div>

</body>
</html>
