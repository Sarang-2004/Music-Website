<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Soundscape</title>
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
            height: 40px; /* Adjust the height of the logo as needed */
            margin-right: auto; /* Push logo to the left */
        }

        h1 {
            margin: 0;
            font-size: 28px; /* Increased font size */
            margin-left: auto; /* Push "Soundscape" to the right */
            margin-right: auto; /* Push "Soundscape" to the left */
            flex-grow: 1; /* Allow the "Soundscape" text to expand */
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
        <img src="logo.jpeg" alt="Logo">
        <h1>Soundscape</h1>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Manage Users</h2>

        <!-- Form for managing users -->
        <form method="post">
            <!-- PHP logic to fetch and display users -->
            <?php
            // Include database connector
            include_once 'db_connector.php';

            // Fetch users from the database
            $users_query = "SELECT user_id, username, password, email FROM users";
            $users_result = $conn->query($users_query);

            if ($users_result->num_rows > 0) {
                echo "<label>Select User to Manage:</label><br>";
                echo "<select name='manage_user'>";
                while ($user_row = $users_result->fetch_assoc()) {
                    echo "<option value='" . $user_row['user_id'] . "'>" . $user_row['username'] . "</option>";
                }
                echo "</select><br><br>";
                echo "<button type='submit' name='view_user_details'>View Details</button>";
                echo "&nbsp;&nbsp;";
                echo "<button type='submit' name='delete_user'>Delete User</button>";
            } else {
                echo "No users found.";
            }
            ?>
        </form>

        <!-- PHP logic for managing users -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // View user details
            if (isset($_POST["view_user_details"])) {
                $user_id = $_POST["manage_user"];
                // Fetch user details from the database based on $user_id
                $user_details_query = "SELECT username, password, email FROM users WHERE user_id = $user_id";
                $user_details_result = $conn->query($user_details_query);
                if ($user_details_result->num_rows > 0) {
                    $user_data = $user_details_result->fetch_assoc();
                    echo "<h3>User Details:</h3>";
                    echo "<p>Username: " . $user_data['username'] . "</p>";
                    // Displaying unhashed password (not recommended for production use)
                    echo "<p>Password: " . $user_data['password'] . "</p>";
                    echo "<p>Email: " . $user_data['email'] . "</p>";
                } else {
                    echo "User details not found.";
                }
            }
            // Delete user
            if (isset($_POST["delete_user"])) {
                $user_id = $_POST["manage_user"];
                // Delete user from the database based on $user_id
                $delete_query = "DELETE FROM users WHERE user_id = $user_id";
                if ($conn->query($delete_query) === TRUE) {
                    echo "User deleted successfully.";
                } else {
                    echo "Error deleting user: " . $conn->error;
                }
            }
        }
        ?>
    </main>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
