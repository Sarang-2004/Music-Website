<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Music - Soundscape</title>
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
            justify-content: center; /* Center content horizontally */
            align-items: center;
        }

        header img {
            height: 80px; /* Adjust the height of the logo as needed */
            margin-right: auto; /* Push logo to the left */
        }

        h1 {
            margin: 0;
            font-size: 28px; /* Increased font size */
            margin-left: auto; /* Push "Soundscape" to the right */
            flex-grow: 1; /* Allow "Soundscape" to take available space */
        }

        main {
            max-width: 600px;
            margin: 50px auto; /* Adjust margin to center vertically */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li a {
            display: block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        li a:hover {
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

    <!-- Main Content -->
    <main>
        <h2>Update Music</h2>

        <!-- Options for updating music details -->
        <ul>
            <li><a href="update_title.php">Update Title</a></li>
            <li><a href="update_artist.php">Update Artist</a></li>
            <li><a href="update_album.php">Update Album</a></li>
            <li><a href="update_genre.php">Update Genre</a></li>
            <li><a href="update_musicfile.php">Update Music File</a></li>
            <li><a href="update_imagefile.php">Update Image File</a></li>
            <!-- Add more options for updating other details if needed -->
        </ul>

        <!-- PHP logic for updating music details -->
        <?php
        // Include database connector
        include_once 'db_connector.php';

        // Add PHP logic for updating other details if needed
        ?>
    </main>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
