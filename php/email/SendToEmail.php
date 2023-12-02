<?php
header('Access-Control-Allow-Origin: *');
include('DBConnect.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$email = $_POST['email_google'];
$fname = $_POST['firstname'];

$sqliMain = "SELECT * from verification_email where EMAIL = '$email' AND STATUS = 'ACTIVE' limit 1";
$resultMain = mysqli_query($con, $sqliMain);
$rowMain = mysqli_fetch_array($resultMain);
if ($resultMain->num_rows > 0) {
    if (is_array($rowMain)) {
      $yourcode = $rowMain['CODE'];
    }
} else {

}
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'buyandsell1130@gmail.com';                     //SMTP username
    $mail->Password   = 'buyandsell_1130_1201';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($email, 'BUY AND SELL');
    $mail->addAddress($email);    


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Verification Code';
    $mail->Body    = 'Dear ' . $fname . ', <br><br> 
    We are excited to have you as part of our community. To ensure the security of your account,
    we require you to verify your email address.<br> 
    Your verification code is: <h2 style="font-weight:bold;">'.$yourcode.'</h2>
    <br>
    Please enter this code on our website or app to complete the verification process. If you didnt request this code, 
    please ignore this email, and your account will remain secure.<br>
    Thank you for choosing our platform. If you have any questions or need assistance, please dont hesitate to contact our support team.
    <br><br>
    
    Best Regards,<br>
    Buy and Sell';

    $mail->send();
    echo 0;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}