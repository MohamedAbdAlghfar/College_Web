<head>
    <style type="text/css">
        .select {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Set the height to 100% of the viewport height */
            margin: 0; /* Remove default margin to prevent horizontal scrolling */
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

<div class="select">
    <select id="category-select" name="parent_id" required class="form-control" style="width: 500px;">
        @foreach($deletedCourseIds as $deletedCourseId)
            <option value="{{ $deletedCourseId->deleted_by }}" style="width: 500px;">{{ $deletedCourseId->name }}</option>
        @endforeach
    </select>

    <br><br><br>

    <!-- Display admin information when the 'Show' button is clicked -->
    <button onclick="showAdminInfo()" class="back-button">Show</button>

    <br><br>
    <a href="/admin/courses" class="back-button">Back</a>
</div>

<!-- Script to handle displaying admin information -->
<script>
    function showAdminInfo() {
        // Get the selected course element
        var selectElement = document.getElementById("category-select");
        
        // Get the selected value (admin ID)
        var selectedAdminId = selectElement.options[selectElement.selectedIndex].value;

        // Perform an action to show the admin information based on the selectedAdminId
        // For example, you might make an AJAX request to fetch and display the admin details
        window.location.href = "/courses/" + selectedAdminId + "/deleted"; // Replace this with your actual logic
    }
</script>
