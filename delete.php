<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Music</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            height: 80px; /* Adjust the height of the logo as needed */
        }

        h1 {
            margin: 0;
            font-size: 28px; /* Increased font size */
            flex-grow: 1; /* Allow the text to grow and take available space */
        }

        main {
            max-width: 600px;
            margin: 50px auto; /* Adjust margin to center vertically */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #dc3545;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #c82333;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="Logo.jpeg" alt="Logo">
        </div>
        <h1>SOUNDSCAPE</h1>
    </header>

    <!-- Content -->
    <h2>Delete Music</h2>
    <form method="post">
        <!-- PHP logic to fetch and display music tracks -->
        <?php
        // Include database connector
        include_once 'db_connector.php';

        // Fetch music tracks from the database
        $tracks_query = "SELECT track_id, title, artist FROM music_tracks";
        $result = $conn->query($tracks_query);

        if ($result->num_rows > 0) {
            echo "<label for='delete_track'>Select Music Track to Delete:</label>";
            echo "<select name='delete_track' id='delete_track'>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['track_id'] . "'>" . $row['title'] . " by " . $row['artist'] . "</option>";
            }
            echo "</select>";
            echo "<br><br>";
            echo "<button type='submit' name='delete_music'>Delete Music</button>";
        } else {
            echo "No music tracks found.";
        }
        ?>
    </form>

    <!-- PHP logic for deleting music -->
    <?php
    // Check if the form for deleting music is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_music"])) {
        // Validate and sanitize input
        $track_id = $_POST["delete_track"];

        // Delete the selected music track from the database
        $delete_query = "DELETE FROM music_tracks WHERE track_id = $track_id";

        if ($conn->query($delete_query) === TRUE) {
            echo "<p>Music track deleted successfully.</p>";
        } else {
            echo "<p>Error deleting music track: " . $conn->error . "</p>";
        }
    }
    ?>

    <!-- Footer -->
    <footer>
        &copy; 2024 SoundScape. All rights reserved.
    </footer>
</body>
</html>
