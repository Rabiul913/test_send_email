<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$errors = [];
$errorMessage = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
  

  if (empty($name)) {
    $errors[] = 'Name is empty';
  }
  if (empty($email)) {
    $errors[] = 'Email is empty';
  }  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email is invalid';
  }


  if (!empty($errors)) {
    $allErrors = join('<br/>', $errors);
    $errorMessage = "<p style='color: red;'>{$allErrors}</p>";

    return $errorMessage;

  } else {
    $toEmail = 'robicmt566@gmail.com';
    $emailSubject = 'New Add Deal';

      // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Configure the PHPMailer instance
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = $email;
            $mail->Password = 'slyzfpckdyyvqgqc';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Set the sender, recipient, subject, and body of the message
            $mail->setFrom($email);
            $mail->addAddress($toEmail);
            $mail->Subject = $emailSubject;
            $mail->isHTML(true);
            // $mail->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";
            $mail->Body = '<h4> Hi, Mr. '. $name . ',</h4>
            <p>Thank you for choosing us.</p></br></br></br></br>
            <p>Thanks</p>
            <p>Kind regards</p>
            <p>Rabiul</p>';

            // Send the message
            $mail->send();

            http_response_code(200);
            return json_encode(['message' => 'Email sent successfully!']) ;
        } catch (Exception $e) {
            http_response_code(500);
            return json_encode(['error' => 'An error occurred while sending the email.']) ;
        }
    }
}

function sanitizeInput($input) {
   $input = trim($input);
   $input = stripslashes($input);
   $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
   return $input;
}

?>
