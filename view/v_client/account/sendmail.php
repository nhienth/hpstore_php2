<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/OAuth.php";
include "PHPMailer/src/POP3.php";
include "PHPMailer/src/SMTP.php";
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->CharSet = 'UTF-8';                                           //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send 
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'nhienth039@gmail.com';               
    $mail->Password = 'taogvszlruntgerv';                                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    

    //Recipients
    $mail->setFrom('nhienth039@gmail.com', 'HPStore');
    $mail->addAddress($email, $check['ho_ten']);

    //Content
    $mail->isHTML(true);                          
    $mail->Subject = 'HPstore - Quên mật khẩu';
    $mail->Body    = 'Xin chào '.$check['ho_ten'].',
    <br>
    Chúng tôi đã nhận được yêu cầu tìm lại mật khẩu của bạn. <br>
    Mật khẩu của bạn là : '.$check['mat_khau'].' <br>
    <a href="http://localhost/HPstore/project-1014/.?controller=login">Đăng nhập</a>
    ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
