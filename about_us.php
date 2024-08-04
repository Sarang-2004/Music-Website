<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            min-height: 100vh; /* Ensure the page fills at least the viewport height */
            position: relative; /* Set the body as the positioning context */
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
            position: absolute; /* Position the header relative to the body */
            width: 100%; /* Ensure the header spans the entire width */
            top: 0; /* Position the header at the top of the page */
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }

        header img {
            width: 65px;
            margin-right: 20px;
        }

        /* Main content styles */
        .content {
            padding: 20px;
            padding-top: 70px; /* Ensure content starts below the header */
            padding-bottom: 50px; /* Ensure content doesn't go under the footer */
        }

        p {
            margin-bottom: 10px;
        }

        /* Footer styles */
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%; /* Ensure the footer spans the entire width */
            position: absolute; /* Position the footer relative to the body */
            bottom: 0; /* Position the footer at the bottom of the page */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="Logo.jpeg" alt="Logo"> <!-- Replace "your-logo.jpeg" with your logo image path -->
        <h1>Soundscape</h1>
    </header>

    <!-- Main content -->
    <div>

    </div>
    <div class="content">
        <h2>About Us</h2>
        <p>Welcome to our website! We are dedicated to providing high-quality music and services to our users.</p>
        <p>Our mission is to create an enjoyable and seamless music experience for all music lovers.</p>
        <p>Feel free to explore our website and discover great music!</p>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
