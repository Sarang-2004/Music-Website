<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Album</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #343a40; /* Text color */
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            align-items: center;
        }

        header img {
            height: 80px;
            margin-right: auto;
        }

        h1 {
            margin: 0 auto; /* Center the text */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
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
        <img src="Logo.jpeg" alt="Logo">
        <h1>SOUNDSCAPE</h1>
    </header>

    <!-- Form for updating music album -->
    <div class="container">
        <h2>Update Album</h2>
        <form method="post">
            <?php
            // Include database connector
            include_once 'db_connector.php';

            // Fetch music tracks from the database
            $tracks_query = "SELECT track_id, title, album FROM music_tracks";
            $result = $conn->query($tracks_query);

            if ($result->num_rows > 0) {
                echo "<label for='update_track'>Select Music Track to Update:</label>";
                echo "<select name='update_track' id='update_track'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['track_id'] . "'>" . $row['title'] . " (Album: " . $row['album'] . ")</option>";
                }
                echo "</select>";
                echo "<br><br>";
                echo "<label for='updated_album'>New Album:</label>";
                echo "<input type='text' name='updated_album' required>";
                echo "<br><br>";
                echo "<button type='submit' name='update_album'>Update Album</button>";
            } else {
                echo "No music tracks found.";
            }
            ?>
        </form>

        <!-- PHP logic for updating music album -->
        <?php
        // Check if the form for updating music album is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_album"])) {
            // Validate and sanitize input
            $track_id = $_POST["update_track"];
            $updated_album = $_POST["updated_album"];

            // Update album in the database
            $update_query = "UPDATE music_tracks SET album = '$updated_album' WHERE track_id = $track_id";
            if ($conn->query($update_query) === TRUE) {
                echo "<p>Music album updated successfully.</p>";
            } else {
                echo "<p>Error updating music album: " . $conn->error . "</p>";
            }
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 Music Store. All rights reserved.
    </footer>
</body>
</html>
