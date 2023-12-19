<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$content="De: $name \nE-mail: $email \nMensaje: $message";
$recipient = "ramiro.adrian.ceballes@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Mail enviado!";
?>
