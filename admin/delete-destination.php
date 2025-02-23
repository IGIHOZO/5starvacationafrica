<?php
require("lib/header.php");

if (!isset($_SESSION['loggedin'])) {
    echo "<script>window.location='../../logout.php';</script>";
}
@require("../lib/drive.php"); 
$con = $pdo;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Destinations WHERE DestinationID = :id";
    
    try {
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            // Redirect to the previous page
            echo "<script>window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            exit();
        } else {
            echo "Error deleting record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}

$con = null;
?>
