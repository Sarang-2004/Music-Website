<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Add position relative for footer positioning */
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
            width: 100%;
            position: absolute;
            top: 0;
            display: flex;
            align-items: center;
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
            margin-left: 20px; /* Adjust the left margin to align the logo to the left corner */
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"], /* Added email input type */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
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
    </style>
</head>
<body>
    <header>
        <img src="Logo.jpeg" alt="Logo">
        <h1>Soundscape</h1>
    </header>
    
    <form method="post" action="register_process.php">
        <h2>User Registration</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" value="Register">
        <?php if(isset($error)) { ?>
            <span class="error"><?php echo $error; ?></span>
        <?php } ?>
    </form>

    <footer>
        &copy; <?php echo date("Y"); ?> Soundscape. All rights reserved.
    </footer>
</body>
</html>
