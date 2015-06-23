<?php
    require 'assets/php/class.phpmailer.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPAuth = Login;
    $mail->SMTPDebug = 2;

    $mail->Host = "localhost";
    //$mail->Password = "";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 2;

    $mail->From = "pxy9548@rit.edu";
    $mail->FromName = "Peter Yeung";
    $mail->addReplyTo("pxy9548@rit.edu", "Reply Address");
    $mail->addAddress("pxy9548@gmail.com", "Peter Yeung");

    $mail->Subject = "Here is an email!";
    $mail->Body = "HELLO WORLD.  This is the body of an email";
    $mail->AltBody = "HELLO WORLD";

    var_dump($mail->send());
?>