<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'munfils96@gmail.com';  // Your Gmail address
    $mail->Password = 'Security@2018';  // Your Gmail password or app-specific password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 465;  // Gmail SMTP port

    // Recipients
    $mail->setFrom('noreply@firstclass.rw', 'First Class');
    $mail->addAddress('munfils96@outlook.com', 'Munyawera');
    $mail->addReplyTo('munfils96@gmail.com', 'Fils');
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email sent from PHPMailer using Gmail SMTP.';

    $mail->send();
    echo 'Message has been sent.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
