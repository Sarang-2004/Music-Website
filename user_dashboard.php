<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUNDSCAPE</title>
    <link rel="stylesheet" href="footer.css">
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

        header img {
            height: 80px; /* Adjust the height of the logo as needed */
        }

        /* Title styles */
        h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Container styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .music-track {
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 0 0 calc(30% - 20px); /* Adjust the width based on your preference */
        }

        .music-track img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .music-track p {
            margin: 5px 0;
            font-size: 16px;
        }

        .music-track audio {
            width: 100%;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .music-track {
                flex-basis: calc(50% - 20px); /* Adjust for smaller screens */
            }
        }

        /* Footer styles */
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Search bar styles */
        .search-bar {
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .search-bar input[type="text"] {
            width: 60%; /* Set the width to 60% of its parent container */
            padding: 10px; /* Adjust padding as needed */
            font-size: medium; /* Set the font size to medium */
            border-radius: 5px;
            border: 1px solid #ccc; /* Add a border for better visual separation */
            box-sizing: border-box; /* Ensure the padding and border are included in the width */
        }

        .search-bar button {
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="Logo.jpeg" alt="Logo"> <!-- Replace "your-logo.png" with your logo image path -->
        <h1>SOUNDSCAPE</h1>
        <div></div> <!-- This empty div is used for spacing, you can adjust its width if needed -->
    </header>

    <!-- Music Tracks -->
    <h2>Search Music</h2>
    <!-- Search bar -->
    <div class="search-bar">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by title, artist, album, or genre...">
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="container">
        <?php
        // Include database connector
        include_once 'db_connector.php';

        // Function to display track details including image
        function displayTrack($track)
        {
            echo "<div class='music-track'>";
            echo "<h3>" . $track['title'] . "</h3>";
            echo "<p>Artist: " . $track['artist'] . "</p>";
            echo "<p>Album: " . $track['album'] . "</p>";
            echo "<p>Genre: " . $track['genre'] . "</p>";

            // Display image if image path is available
            if (!empty($track['image_path'])) {
                echo "<img src='" . $track['image_path'] . "' alt='Track Image' style='max-width: 125px;'>";
            } else {
                echo "<p>No image available</p>";
            }

            echo "<audio id='audio-" . $track['track_id'] . "' controls>";
            echo "<source src='" . $track['file_path'] . "' type='audio/mpeg'>";
            echo "Your browser does not support the audio element.";
            echo "</audio>";

            echo "</div>";
        }

        // Retrieve search term
        $searchTerm = "";
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
        }

        // Construct SQL query with search term
        $sql = "SELECT * FROM music_tracks WHERE 
                title LIKE '%$searchTerm%' OR
                artist LIKE '%$searchTerm%' OR 
                album LIKE '%$searchTerm%' OR 
                genre LIKE '%$searchTerm%'";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any tracks available
        if ($result->num_rows > 0) {
            // Display each track
            while ($track = $result->fetch_assoc()) {
                displayTrack($track);
            }
        } else {
            echo "<p>No tracks found matching your search.</p>";
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 SoundScape. All rights reserved.
    </footer>

    <script>
        // Get all audio elements
        var audioElements = document.getElementsByTagName('audio');

        // Pause all other audio elements when one starts playing
        function pauseAllExcept(targetId) {
            for (var i = 0; i < audioElements.length; i++) {
                if (audioElements[i].id !== targetId) {
                    audioElements[i].pause();
                }
            }
        }

        // Add event listeners to toggle play/pause and pause other audio elements
        for (var i = 0; i < audioElements.length; i++) {
            audioElements[i].addEventListener('play', function(event) {
                pauseAllExcept(event.target.id);
            });
        }
    </script>
</body>
</html>
