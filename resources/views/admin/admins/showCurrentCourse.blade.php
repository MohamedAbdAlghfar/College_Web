<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin – Student Grades</title>
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
            padding: 40px 20px 20px 20px;
            color: white;
        }

        .header h2 {
            font-size: 35px;
            margin-bottom: 5px;
        }

        .header h4 {
            margin: 5px 0;
            font-weight: normal;
        }

        /* Table container */
        .table-container {
            background-color: white;
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            padding: 20px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: #1976d2;
            color: white;
            padding: 12px;
            font-size: 16px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            vertical-align: middle;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
        }

        input[type="number"] {
            width: 80px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 6px 12px;
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1976d2;
        }

        /* Back Button */
        .back-button {
            display: block;
            width: fit-content;
            margin: 30px auto;
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
        <h2>Admin – Student Grades</h2>
        <h4><strong>Admin Name:</strong> {{ $user->name }}</h4>
        <h4><strong>Admin Level:</strong> {{ $user->level }}</h4>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Course Image</th>
                    <th>Course Name</th>
                    <th>Points</th>
                    <th>Level</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>
                            @if($course->photo)
                                <img src="/images/{{ $course->photo->filename }}" alt="Course Photo">
                            @else
                                <img src="/images/default.jpeg" alt="Course Photo">
                            @endif
                        </td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->point }}</td>
                        <td>{{ $course->level }}</td>
                        <td>
                            <form method="post" action="{{ route('ShowCurrentCourse.storeAdminGrade', ['course_id' => $course, 'user_id' => $user]) }}" autocomplete="off">
                                @csrf
                                <input type="number" id="grade" name="grade" placeholder="Enter grade" min="0" max="100" >
                                <button type="submit" id="submit">SAVE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('admins.index') }}" class="back-button">← Back</a>

    <footer>
        <p>Contact: <a href="mailto:mohamedabdodv@gmail.com" style="color: white;">mohamedabdodv@gmail.com</a></p>
    </footer>

</body>
</html>
