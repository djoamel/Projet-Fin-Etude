<?php
include_once "conection.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert data into the contact table
    $insert_query = "INSERT INTO `contact`(`name`, `email`, `message`) VALUES ('$full_name', '$email', '$message')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'fusion10dbs@gmail.com';
            $mail->Password = 'gavsxjwllcbrowig';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('fusion10dbs@gmail.com', 'Feedback Form');
            $mail->addAddress('fusion10dbs@gmail.com');  

            $mail->isHTML(true);
            $mail->Subject = 'Feedback from job opp';
            $mail->Body    = " <div>Full Name: $full_name<br><br>Email: $email<br><br>Message: $message </div> ";

            if ($mail->send()) {
                $_SESSION['feedback'] = "Thank you for your feedback!";
            } else {
                $_SESSION['feedback'] = "Feedback could not be sent. Please try again.";
            }
        } catch (Exception $e) {
            $_SESSION['feedback'] = "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['feedback'] = "There was an error submitting your feedback. Please try again.";
    }

    header('Location: thanks.php');
    exit;
}
?>
