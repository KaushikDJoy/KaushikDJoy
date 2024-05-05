<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup & Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: #333333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        button {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #cccccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555555;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            background-color: #f9f9f9;
        }

        button {
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        button:focus {
            outline: none;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <form action="signup.php" method="post">
    <h2>Sign Up</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit" name="signup">Sign Up</button>
    </form>

    <form action="login.php" method="post">
        <h2>Login</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <?php
    session_start(); // Start the session
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
        $servername = "localhost";
        $username = "admin"; // MySQL username
        $password = "12345"; //  MySQL password
        $dbname = "blood_bank_system"; // database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);

        // Set parameters and execute
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        if ($stmt->execute()) {
            $_SESSION['username'] = $username; // Store username in session
            $stmt->close();
            $conn->close();
            header("Location: bloodbank_homepage.html"); // Redirect to homepage
            exit(); // Stop executing the script
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>