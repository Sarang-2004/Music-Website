<?php
session_start(); // Start the session

// Include database connector
include_once 'db_connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username exists
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Compare passwords directly (without hashing)
        if ($password === $row['password']) {
            $_SESSION['username'] = $username; // Set session variable
            header("Location: user_dashboard.php"); // Redirect to dashboard
            exit(); // Stop further execution
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Username does not exist";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="footer.css">
    <title>SOUNDSCAPE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            flex-grow: 1; /* Allow the title to take up remaining space */
            text-align: center; /* Center the title horizontally */
        }

        header img {
            width: 80px;
            margin-right: 20px;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            margin-top: 60px; /* Adjust this value to keep form below the header */
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <header>
        <img src="Logo.jpeg" alt="Logo">
        <h1>SOUNDSCAPE</h1>
        <div></div> <!-- Empty div for spacing -->
    </header>

    <form method="post" action="">
        <h2>User Login</h2>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>

    <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
