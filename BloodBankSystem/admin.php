<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Information Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id" value="auto-generated-by-database">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>


            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group" required>
                <option value="">Select Blood Group</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                  <option value="A+">A+</option>
                    <option value="A-">A-</option>
                      <option value="B+">B+</option>
                        <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
           
            </select><br><br>

            <label for="availability">Availability (units):</label>
            <select id="availability" name="availability" required>
                <option value="">Select Availability</option>
                <option value="0">0 unit</option>
                <option value="1">1 unit</option>
                <option value="2">2 units</option>
                <option value="3">3 units</option>
                <option value="4">4 units</option>
                <option value="5">5 units</option>
             
            </select><br><br>

            <label for="location">Location:</label>
            <select id="location" name="location" required>
                <option value="">Select Location</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Chattogram">Chattogram</option>
                <option value="Khulna">Khulna</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Barishal">Barishal</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Mymensingh">Mymensingh</option>

            </select><br><br>


            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <input type="submit" value="Submit">
        </form>

        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "admin"; //  MySQL username
    $password = "12345"; 
    $dbname = "blood_donation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $blood_group = $conn->real_escape_string($_POST['blood_group']);
    $availability = $conn->real_escape_string($_POST['availability']);
    $location = $conn->real_escape_string($_POST['location']);
    $contact = $conn->real_escape_string($_POST['contact']);

    // Attempt insert query execution
    $sql = "INSERT INTO users (name, blood_group, availability, location, contact) 
            VALUES ('$name', '$blood_group', '$availability', '$location', '$contact')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
    </div>
</body>
</html>