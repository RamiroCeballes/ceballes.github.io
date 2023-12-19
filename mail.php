<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
if ($name === ''){
  echo "El nombre no puede estar vacío.";
  die();
}
if ($email === ''){
  echo "El mail no puede estar vacío.";
  die();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Formato de mail inválido.";
    die();
  }
}
if ($subject === ''){
  echo "El asunto no puede estar vacío.";
  die();
}
if ($message === ''){
  echo "El mensaje no puede estar vacío.";
  die();
}
$content="De: $name \nE-mail: $email \nMensaje: $message";
$recipient = "ramiro.adrian.ceballes@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Mail enviado!";
?>
