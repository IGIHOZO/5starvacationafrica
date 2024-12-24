<?php
// Database configuration

// $servername = "localhost";
// $username = "Igihozo";
// $password = "Igihozo!#07";
// $dbname = "5startvacationafrica";

$servername = "localhost";
$username = "root";
$password = "Igihozo!#07";
$dbname = "5startvacationafrica";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
