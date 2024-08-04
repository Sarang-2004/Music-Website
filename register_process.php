<?php
// Include database connector
include_once 'db_connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if username already exists in users table
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $error = "Username already exists";
        include_once 'register.php'; // Include register.php to display the error message
        exit(); // Stop further execution
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        if ($conn->query($insert_query) === TRUE) {
            // Redirect to user dashboard after successful registration
            header("Location: user_dashboard.php");
            exit(); // Stop further execution
        } else {
            $error = "Error: " . $insert_query . "<br>" . $conn->error;
            include_once 'register.php'; // Include register.php to display the error message
            exit(); // Stop further execution
        }
    }
}
?>

