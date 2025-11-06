<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Deleted Course</title>
    <style>
        body {
            background-color: #2196f3;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* White Box */
        .card {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            padding: 40px 60px;
            text-align: center;
            width: 90%;
            max-width: 500px;
        }

        h2 {
            color: #2196f3;
            margin-bottom: 30px;
            font-size: 26px;
        }

        select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 25px;
            outline: none;
        }

        select:focus {
            border-color: #2196f3;
            box-shadow: 0 0 5px #2196f3;
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
            margin: 10px;
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

        footer {
            text-align: center;
            color: white;
            margin-top: 30px;
            font-size: 14px;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2>Select Deleted Course</h2>
            
            <select id="category-select" name="parent_id" required>
                @foreach($deletedCourseIds as $deletedCourseId)
                    <option value="{{ $deletedCourseId->deleted_by }}">{{ $deletedCourseId->name }}</option>
                @endforeach
            </select>

            <div>
                <button onclick="showAdminInfo()" class="button">Show</button>
                <a href="/admin/courses" class="button back-button">Back</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Contact: <a href="mailto:mohamedabdodv@gmail.com" style="color: white;">mohamedabdodv@gmail.com</a></p>
    </footer>

    <script>
        function showAdminInfo() {
            const selectElement = document.getElementById("category-select");
            const selectedAdminId = selectElement.value;
            window.location.href = "/courses/" + selectedAdminId + "/deleted";
        }
    </script>

</body>
</html>
