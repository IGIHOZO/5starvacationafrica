<?php
include 'dbcon.php'; // Include the database connection

// Check if the form is submitted with the required POST variables
if (isset($_POST['applicant_id']) && isset($_POST['action']) && $_POST['action'] == 'reject') {
    // Sanitize the input to prevent SQL injection
    $id = intval($_POST['applicant_id']);

    // SQL query to update the status to 'rejected'
    $sql = "UPDATE registrations SET status = 'rejected' WHERE applicant_id = '$id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the registration list or show a success message
        header('Location: applications.php');
        
      
        
        // Assuming this is the page where you show the table
        exit(); // Make sure to stop further script execution after redirect
    } else {
        // Handle error in case the update fails
        echo "Error updating record: " . $conn->error;
    }
} else {
    // In case of missing POST data, redirect or show an error
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
