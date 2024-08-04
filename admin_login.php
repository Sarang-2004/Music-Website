<?php
session_start(); // Start the session

// Include database connector
include_once 'db_connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username exists in admin table
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) { // Compare passwords without hashing
            $_SESSION['admin_username'] = $username; // Set session variable
            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
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
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            position: relative;
            min-height: 100vh;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
            top: 0;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex-grow: 1;
        }

        header img {
            width: 80px;
            margin-right: 20px;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            width: 300px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto; /* Center the form horizontally */
            margin-top: 20vh; /* Adjust the margin-top value to center vertically */
        }

        h2 {
            text-align: center;
            color: #333;
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
            background-color: #dc3545;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #c82333;
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
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img src="Logo.jpeg" alt="Logo"> <!-- Replace "logo.jpeg" with your logo image path -->
        <h1>SOUNDSCAPE</h1>
    </header>

    <!-- Main content -->
    <form method="post" action="">
        <h2>Admin Login</h2>
        <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Login">
    </form>
    <div class="register-link">
        <p>Manage your music here. <a href="admin_register.php">Register new admin</a></p>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
