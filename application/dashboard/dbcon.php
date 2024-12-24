<?php
// Database configuration
$servername = "localhost"; // Change if needed
$username = "testing_user"; // Your database username
$password = "GYdpVr(DS1_a"; // Your database password
$dbname = "test_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
