<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOUNDSCAPE</title>
    <link rel="stylesheet" href="style.css">
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
            background-color: #343a40; /* Same color as footer */
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: flex;
            justify-content: center; /* Center header content */
            align-items: center;
            flex-direction: column; /* Center items vertically */
        }

        header img {
            height: 80px; /* Adjust the height of the logo as needed */
            margin-right: 20px;
        }

        /* Title styles */
        h1 {
            margin: 0;
            font-size: 24px;
            color: white; /* Set title font color to white */
        }

        /* Container styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column; /* Adjusted to vertical layout */
            align-items: center; /* Centering horizontally */
            text-align: center;
        }

        .login-options {
            margin-bottom: 20px;
        }

        .login-btn {
            color: white;
            background-color: #007bff; /* Bootstrap primary color */
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 10px;
        }

        section {
            margin-bottom: 20px;
        }

        section h2 {
            margin-top: 0;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="Logo.jpeg" alt="Logo"> <!-- Replace "medium_logo.png" with your logo image path -->
        <h1>Welcome to SOUNDSCAPE</h1>
    </header>

    <div class="container">
        <div class="login-options">
            <a href="user_login.php" class="login-btn">User Login</a>
            <a href="admin_login.php" class="login-btn">Admin Login</a>
        </div>
        <section>
            <h2>Explore Music</h2>
            <p>Sign in as a user or admin to access a wide range of music.</p>
        </section>
        <section>
            <h2>About Us</h2>
            <p>Learn more about our music store.</p>
            <a href="about_us.php">About Us</a>
        </section>
        <footer>
            © 2024 Music Store. All rights reserved.
        </footer>
    </div>
</body>
</html>
