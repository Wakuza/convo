<?php
$to = 'pxy9548@gmail.com';
$subject = 'Test email'; 
$message = "Hello World!\n\nThis is my first mail."; 
$headers = "From: pxy9548@gmail.com";
$mail_sent = @mail($to, $subject, $message, $headers);

echo $mail_sent ? "Mail sent" : "Mail failed";
?>