<!DOCTYPE html>
<html lang="en">
<head>
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="styles.css" rel="stylesheet" id="bootstrap-css">

    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>
    <form action="register.php" method="POST" enctype="multipart/form-data">
      
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome to First  class Tours Application form</h3>
                        <p>Thank you for your interest in joining First Class Tours as an intern! Please complete the form below to apply for one of our exciting internship opportunities.</p>
                       
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">First Class</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tours</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as an Intern</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name *" value="" required />
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="number" name="phone_number" class="form-control" placeholder="Phone Number *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Email *" value="" required />
                                        </div>
                                         <div class="form-group">
                                             Start Date *
                                            <input type="date" name="start_date" class="form-control"  placeholder="Email *" value="" required />
                                        </div>
                                        
                                         <div class="form-group">
                                             End Date *
                                            <input type="date" name="end_date" class="form-control"  placeholder="Email *" value="" required />
                                        </div>
                                        
                                           <div class="form-group">
                                             Upload your CV *
                                            <input type="file" name="cv" class="form-control"   required />
                                        </div>
                                        
                                          <div class="form-group">
                                             Upload your Request Letter *
                                            <input type="file" name="request_letter" class="form-control"   required />
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="female">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nationality" class="form-control" placeholder="Enter Your Nationality *" value="" required />
                                        </div>
                                        <div class="form-group">
                                       <input type="text" name="country_of_residence" class="form-control" placeholder="Enter Your country of Residency *" value="" required />

                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="department" required>
                                                <option class="hidden"  selected disabled>Please select Your Preferred Department</option>
                                          <option value="Sales and Marketing">Sales and Marketing</option>

                                                <option value="Tour Consultant">Tour Consultant</option>
                             <option value="Tourism Development">Tourism Development</option>
                        
                                            </select>
                                        </div>
                                        
                                             <div class="form-group">
                                            <select class="form-control" name="internship_level" required>
                                                <option class="hidden"  selected disabled>Please select Your Internship Level</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <!--<option value="On-site">On-site</option>-->
                                                
                                            </select>
                                        </div>
                                        
                                        
                                            <div class="form-group">
                                            <select class="form-control" name="type_of_interneship" required>
                                                <option class="hidden"  selected disabled>Please select Your Type of Internship</option>
                                                <option value="Academic Internship (for students completing their studies)">Academic Internship (for students completing their studies)</option>
                                                <option value="Professional Internship (for individuals seeking professional experience)">Professional Internship (for individuals seeking professional experience)</option>
                                        
                                                
                                            </select>
                                        </div>
                                        
                                        
                                       <div class="form-group">
    <textarea 
        name="additional_info" 
        placeholder="Why are you interested in an internship at First Class Tours? (Optional, but encouraged to help us understand your motivations) Limit 50 words." 
        class="form-control" 
        style="height: 122px;" 
        oninput="limitLines(this, 50)">
    </textarea>
</div>

<script>
function limitLines(textarea, maxCharsPerLine) {
    const lines = textarea.value.split("\n"); // Split input into lines
    const limitedLines = lines.map(line => 
        line.length > maxCharsPerLine ? line.substring(0, maxCharsPerLine) : line
    );
    textarea.value = limitedLines.join("\n"); // Reconstruct limited input
}
</script>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </form>
</body>
</html>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbcon.php");
require 'vendor/autoload.php'; // Ensure PHPMailer is autoloaded

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $nationality = $_POST['nationality'];
    $country_of_residence = $_POST['country_of_residence'];
    $department = $_POST['department'];
    $internship_level = $_POST['internship_level'];
    $type_of_internship = $_POST['type_of_interneship'];
    $gender = $_POST['gender'];
    $additional_info = $_POST['additional_info'];
    $date_added = date("d/m/Y h:i:s");

    // Handle CV upload
    $cv_path = '';
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $cv_path = 'uploads/' . basename($_FILES['cv']['name']);
        move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
    }

    // Handle Request Letter upload
    $request_letter_path = '';
    if (isset($_FILES['request_letter']) && $_FILES['request_letter']['error'] == 0) {
        $request_letter_path = 'uploads/' . basename($_FILES['request_letter']['name']);
        move_uploaded_file($_FILES['request_letter']['tmp_name'], $request_letter_path);
    }

    // Prepare the SQL statement with the additional request_letter_path column
    $stmt = $conn->prepare("INSERT INTO registrations (name, email, phone_number, start_date, end_date, nationality, country_of_residence, department, internship_level, type_of_internship, gender, additional_info, cv_path, request_letter_path) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind the parameters to the statement, including the new request_letter_path
    $stmt->bind_param("ssssssssssssss", $name, $email, $phone_number, $start_date, $end_date, $nationality, $country_of_residence, $department, $internship_level, $type_of_internship, $gender, $additional_info, $cv_path, $request_letter_path);

    // Execute and check for success
    if ($stmt->execute()) {
        echo "<script>
                alert('Registration successful! Once approved, you will receive an email.');
                window.location.href = 'register.php';
              </script>";

        // Send Email with PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'firstclasstours.rw';
            $mail->SMTPAuth = true;
            $mail->Username = 'admin@firstclasstours.rw';
            $mail->Password = 'Security@firstclasstours.rw';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('no-reply@firstclasstours.rw', 'First Class Tours Application Notifier');
            $mail->addAddress('firstclasstours1@gmail.com'); // Send to admin email

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'New Application Submission';
            $mail->Body = "<h2>Dear CEO of First Class Tours, you have Received New Application </h2>
                           <p><strong>Name:</strong> $name</p>
                           <p><strong>Email:</strong> $email</p>
                           <p><strong>Phone Number:</strong> $phone_number</p>
                           <p><strong>Start Date:</strong> $start_date</p>
                           <p><strong>End Date:</strong> $end_date</p>
                           <p><strong>Nationality:</strong> $nationality</p>
                           <p><strong>Country of Residence:</strong> $country_of_residence</p>
                           <p><strong>Department:</strong> $department</p>
                           <p><strong>Internship Level:</strong> $internship_level</p>
                           <p><strong>Type of Internship:</strong> $type_of_internship</p>
                           <p><strong>Gender:</strong> $gender</p>
                           <p><strong>Additional Info:</strong> $additional_info</p>
                           <p><strong>Submitted on:</strong> $date_added</p>";

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'register.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();

?>
