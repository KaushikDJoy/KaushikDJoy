<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "blood_donation";

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "Database connected";
}

?>