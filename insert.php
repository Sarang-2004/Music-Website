<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundscape - Insert Music</title>
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
        }

        header img {
            height: 80px; /* Adjust the height of the logo as needed */
            float: left;
            margin-right: 10px;
        }

        h1 {
            margin: 0;
            font-size: 28px; /* Increased font size */
            display: inline-block;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

    <!-- Form for inserting music -->
    <form method="post" enctype="multipart/form-data">
        <!-- Input field for title -->
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br><br>
        <!-- Input field for artist -->
        <label for="artist">Artist:</label>
        <input type="text" name="artist" id="artist" required>
        <br><br>
        <!-- Input field for album -->
        <label for="album">Album:</label>
        <input type="text" name="album" id="album" required>
        <br><br>
        <!-- Input field for genre -->
        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required>
        <br><br>
        <!-- Input field for music file -->
        <label for="music_file">Choose Music File:</label>
        <input type="file" name="music_file" id="music_file" required>
        <br><br>
        <!-- Input field for image file -->
        <label for="image_file">Choose Image File:</label>
        <input type="file" name="image_file" id="image_file" required>
        <br><br>
        <!-- Button to insert the music -->
        <button type="submit" name="insert_music">Insert Music</button>
    </form>

    <!-- PHP logic for inserting music -->
    <?php
    // Include database connector
    include_once 'db_connector.php';

    // Check if the form for inserting music is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert_music"])) {
        // Validate and sanitize input
        $title = htmlspecialchars($_POST["title"]);
        $artist = htmlspecialchars($_POST["artist"]);
        $album = htmlspecialchars($_POST["album"]);
        $genre = htmlspecialchars($_POST["genre"]);

        // Handle file uploads
        $music_file = $_FILES["music_file"];
        $image_file = $_FILES["image_file"];

        // Access file properties like name, type, etc.
        $music_file_name = $music_file["name"];
        $image_file_name = $image_file["name"];

        // Upload files to server
        $upload_dir = "uploads/";
        move_uploaded_file($music_file["tmp_name"], $upload_dir . $music_file_name);
        move_uploaded_file($image_file["tmp_name"], $upload_dir . $image_file_name);

        // Insert music details into the database
        $insert_query = "INSERT INTO music_tracks (title, artist, album, genre, file_path, image_path) 
                        VALUES ('$title', '$artist', '$album', '$genre', '$upload_dir$music_file_name', '$upload_dir$image_file_name')";

        if ($conn->query($insert_query) === TRUE) {
            echo "<p>Music inserted successfully.</p>";
        } else {
            echo "<p>Error inserting music: " . $conn->error . "</p>";
        }
    }
    ?>
    
    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
