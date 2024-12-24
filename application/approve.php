<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php'; // for PDF library and PHPMailer
use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include ("dbcon.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['applicant_id'])) {
    $id = $_POST['applicant_id'];

// Update application status
$sql = "UPDATE registrations SET status = 'approved' WHERE applicant_id= '$id'";
if ($conn->query($sql) === TRUE) {

    // Fetch applicant details
    $sql = "SELECT * FROM registrations WHERE applicant_id = '$id'";
    $result = $conn->query($sql);
    $applicant = $result->fetch_assoc();

    // Generate PDF
    $dompdf = new Dompdf();
    
    // Get today's date
    $dateIssued = date("F j, Y");

    // HTML content for the PDF
   // Convert image to base64 (example for logo)
$logoBase64 = base64_encode(file_get_contents('images/logo.png'));
    $signatureBase64 = base64_encode(file_get_contents('images/signature.png'));


    $html = "
    <div style='text-align: center;'>
        <img src='data:image/png;base64,$logoBase64' alt='Company Logo' style='width: 150px;'><br>
        <strong>First Class Tours</strong><br>
        Address: Kigali, Rwanda<br>
        Email: info@firstclasstours.rw<br>
        Phone: +250788913722/+25078400979<br>
        Acceptance issued on: $dateIssued
    </div>
    <hr>
    <h1 style='text-align: center;'>Acceptance Letter</h1>
    <p>Dear " . $applicant['name'] . ",</p>
    <p>
    We are pleased to inform you that you have been selected for an internship at First Class Tours in the <strong> " . $applicant['department'] . ".</strong> Congratulations on this achievement! We are excited to have you join our team and look forward to the valuable contributions you will make during your time with us.
    </p>
    
     <p>
   Your internship will begin on <strong> " . $applicant['start_date'] . " </strong> and conclude on <strong> " . $applicant['end_date'] . ". </strong> During this period, you will have the opportunity to work alongside experienced professionals, gaining practical experience and insights into the tourism industry in Rwanda. 
    </p>
    
      <p>
  As part of your internship, you will receive mentorship from our dedicated team, who will support your growth and development throughout the program. Additionally, you will be given the chance to immerse yourself in the vibrant Rwandan tourism landscape.
    </p>
    
  
    <p>We are excited to have you onboard and look forward to a successful and enriching experience together.</p>
    <br>
    <p style='text-align: right;'>Sincerely,<br><br>
  
    Mr. Akingeneye ALPHONSE<br> CEO, First Class Tours <br>
      <img src='data:image/png;base64,$signatureBase64' alt='MD Signature' style='width: 100px;'>
    
    </p>
    ";


    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $pdf = $dompdf->output();
    $pdfPath = "approved_acceptance/Acceptance_Letter_" . $applicant['name'] . $applicant['applicant_id'] . ".pdf";
    file_put_contents($pdfPath, $pdf);

    // Send Email with PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'firstclasstours.rw';  // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@firstclasstours.rw';  // Your SMTP username
        $mail->Password = 'Security@firstclasstours.rw';  // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Use STARTTLS
        $mail->Port = 587;  // Port 587 for STARTTLS
        //$mail->SMTPDebug = 2;

        // Recipients
        $mail->setFrom('no-reply@firstclasstours.rw', 'First Class Tours');
        $mail->addAddress($applicant['email'], $applicant['name']);

        // Attach PDF
        $mail->addAttachment($pdfPath, 'Acceptance_Letter.pdf');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Application Approved';
        $mail->Body = "Dear " . $applicant['name'] . ",<br><br>Your application has been approved. Please find your acceptance letter attached.";

        $mail->send();
     
        
         echo "<script>
                alert('Application approved and email sent.');
                window.location.href = 'dashboard/applications.php';
              </script>";
              
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    echo "Error updating record: " . $conn->error;
}

// if (file_exists($pdfPath)) {
//     echo "PDF generated successfully.";
// } else {
//     echo "PDF generation failed.";
// }

// if (file_exists($pdfPath)) {
//     echo "File exists. Proceeding with sending.";
// } else {
//     echo "File does not exist. Check PDF generation.";
// }
}
$conn->close();
?>
