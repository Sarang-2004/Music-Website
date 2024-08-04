<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUNDSCAPE - Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Change the background color as needed */
        }

        header {
            background-color: #808080; /* Change the background color as needed */
            padding: 20px;
            color: #fff; /* Change the text color as needed */
            text-align: center; /* Center the text */
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center; /* Center the logo and text */
        }

        .logo-container img {
            width: 80px; /* Adjust the size of the logo image as needed */
            margin-right: 10px; /* Add some space between the logo and text */
        }

        h1 {
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Adjust the top margin as needed */
        }

        .options {
            display: flex;
            flex-direction: column; /* Align buttons vertically */
            align-items: center; /* Center buttons horizontally */
            gap: 20px;
        }

        .admin-option {
            background-color: #800080; /* Change the background color as needed */
            color: #fff; /* Change the text color as needed */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center; /* Center text within buttons */
            width: 200px; /* Set width of buttons */
        }

        .admin-option:hover {
            background-color: #6a0d6a; /* Change the background color on hover as needed */
        }

        footer {
            background-color: #808080; /* Change the background color as needed */
            color: #fff; /* Change the text color as needed */
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Center the Welcome Admin message */
        .welcome-message {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="Logo.jpeg" alt="Logo">
            <h1>SOUNDSCAPE</h1>
        </div>
    </header>

    <!-- Welcome Admin Message -->
    <div class="welcome-message">
        <p>Welcome Admin! Please select your option.</p>
    </div>

    <!-- Admin Dashboard Options -->
    <div class="container">
        <div class="options">
            <a href="insert.php" class="admin-option">Insert Data</a>
            <a href="delete.php" class="admin-option">Delete Data</a>
            <a href="update.php" class="admin-option">Update Data</a>
            <a href="manage_users.php" class="admin-option">Manage Users</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 SoundScape. All rights reserved.
    </footer>
</body>
</html>
