<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Music Title - Soundscape</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center; /* Center align content */
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center;
        }

        header img {
            height: 40px; /* Adjust the height of the logo as needed */
            margin-right: 10px; /* Add some margin between logo and text */
        }

        h1 {
            margin: 0;
            font-size: 28px; /* Increased font size */
        }

        main {
            max-width: 600px;
            margin: 50px auto; /* Center content vertically */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label,
        input,
        select,
        button {
            display: block;
            margin-bottom: 15px;
            width: 100%; /* Make elements take up full width */
        }

        input[type="text"] {
            width: calc(100% - 40px); /* Adjust width to accommodate padding */
            padding: 10px; /* Add padding */
            margin-bottom: 20px; /* Increase margin */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="Logo.jpeg" alt="Logo">
        <h1>Soundscape</h1>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Update Music Title</h2>

        <!-- Form for updating music title -->
        <form method="post">
            <!-- PHP logic to fetch and display music tracks -->
            <?php
            // Include database connector
            include_once 'db_connector.php';

            // Fetch music tracks from the database
            $tracks_query = "SELECT track_id, title, artist FROM music_tracks";
            $result = $conn->query($tracks_query);

            if ($result->num_rows > 0) {
                echo "<label for='update_track'>Select Music Track to Update:</label>";
                echo "<select name='update_track' id='update_track'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['track_id'] . "'>" . $row['title'] . " by " . $row['artist'] . "</option>";
                }
                echo "</select>";
                echo "<br><br>";
                echo "<label for='updated_title'>New Title:</label>";
                echo "<input type='text' name='updated_title' required>";
                echo "<br><br>";
                echo "<button type='submit' name='update_title'>Update Title</button>";
            } else {
                echo "No music tracks found.";
            }
            ?>
        </form>

        <!-- PHP logic for updating music title -->
        <?php
        // Check if the form for updating music title is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_title"])) {
            // Validate and sanitize input
            $track_id = $_POST["update_track"];
            $updated_title = $_POST["updated_title"];

            // Update title in the database
            $update_query = "UPDATE music_tracks SET title = '$updated_title' WHERE track_id = $track_id";

            if ($conn->query($update_query) === TRUE) {
                echo "<p>Music title updated successfully.</p>";
            } else {
                echo "<p>Error updating music title: " . $conn->error . "</p>";
            }
        }
        ?>
    </main>
</body>
</html>
