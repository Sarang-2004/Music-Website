<?php
// Include database connector
include_once 'db_connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check if username already exists in admins table
    $query = "SELECT * FROM admins WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $error = "Username already exists";
        include 'admin_register.php'; // Include admin_register.php to display the error message
        exit(); // Stop further execution
    } else {
        // Insert new admin user into the database without hashing the password
        $insert_query = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            // Redirect to admin dashboard after successful registration
            header("Location: admin_dashboard.php");
            exit(); // Stop further execution
        } else {
            $error = "Error: " . $insert_query . "<br>" . $conn->error;
            include 'admin_register.php'; // Include admin_register.php to display the error message
            exit(); // Stop further execution
        }
    }
}
?>
