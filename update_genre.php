<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Genre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Header styles */
        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }

        header img {
            width: 40px; /* Adjust the width of the logo as needed */
            height: auto; /* Maintain aspect ratio */
        }

        /* Title styles */
        h2 {
            margin: 20px 0 10px;
            font-size: 24px;
        }

        /* Form styles */
        form {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Footer styles */
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="logo.jpeg" alt="Logo"> <!-- Replace "your-logo.jpeg" with your logo image path -->
        <h1>Soundscape</h1>
        <div></div> <!-- Empty div for spacing -->
    </header>

    <!-- Main content -->
    <h2>Update Genre</h2>

    <!-- Form for updating music genre -->
    <form method="post">
        <!-- PHP logic to fetch and display music tracks -->
        <?php
        // Include database connector
        include_once 'db_connector.php';

        // Fetch music tracks from the database
        $tracks_query = "SELECT track_id, title, genre FROM music_tracks";
        $result = $conn->query($tracks_query);

        if ($result->num_rows > 0) {
            echo "<label for='update_track'>Select Music Track to Update:</label>";
            echo "<select name='update_track' id='update_track'>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['track_id'] . "'>" . $row['title'] . " (Genre: " . $row['genre'] . ")</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "<label for='updated_genre'>New Genre:</label>";
            echo "<input type='text' name='updated_genre' required>";
            echo "<br><br>";
            echo "<button type='submit' name='update_genre'>Update Genre</button>";
        } else {
            echo "No music tracks found.";
        }
        ?>
    </form>

    <!-- PHP logic for updating music genre -->
    <?php
    // Check if the form for updating music genre is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_genre"])) {
        // Validate and sanitize input
        $track_id = $_POST["update_track"];
        $updated_genre = $_POST["updated_genre"];

        // Update genre in the database
        $update_query = "UPDATE music_tracks SET genre = '$updated_genre' WHERE track_id = $track_id";
        if ($conn->query($update_query) === TRUE) {
            echo "<p>Music genre updated successfully.</p>";
        } else {
            echo "<p>Error updating music genre: " . $conn->error . "</p>";
        }
    }
    ?>
    
    <!-- Footer -->
    <footer>
        &copy; 2024 Soundscape. All rights reserved.
    </footer>
</body>
</html>
