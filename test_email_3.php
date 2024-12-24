<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true); 
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'mail.5starvacationafrica.com'; // Set the SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@5starvacationafrica.com'; // Your email address
    $mail->Password = 'Igihozo!#07'; // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 465; // SMTP Port

    // Recipients
    $mail->setFrom('no-reply@5starvacationafrica.com', 'Your Name');
    $mail->addAddress('ddrigihozo@gmail.com'); // Recipient's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a <b>test email</b> sent from PHP script!';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>