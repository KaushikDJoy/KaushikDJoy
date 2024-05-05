<?php
session_start(); // Start the session
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
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
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);

    // Set parameters and execute
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_username, $db_password);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($password, $db_password)) {
            $_SESSION['username'] = $username; // Store username in session
            header("Location: bloodbank_homepage.html"); // Redirect to homepage
            exit(); // Stop executing the script
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>