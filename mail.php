<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Verifica que los campos requeridos no estén vacíos
    if (empty($name) || empty($email) || empty($message)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Configura la dirección de correo electrónico y el asunto
    $recipient = "ramiro.adrian.ceballes@gmail.com";
    $subject = "Nuevo mensaje de contacto de $name";

    // Construye el cuerpo del correo electrónico
    $email_content = "Nombre: $name\n";
    $email_content .= "Correo electrónico: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Configura los encabezados del correo electrónico
    $headers = "De: $name <$email>";

    // Envía el correo electrónico
    if (mail($recipient, $subject, $email_content, $headers)) {
        echo "OK";
    } else {
        echo "Hubo un problema al enviar el mensaje. Inténtalo de nuevo más tarde.";
    }
} else {
    // Si no es una solicitud POST, redirige a la página de inicio del sitio o muestra un mensaje de error
    echo "Acceso no permitido.";
}
?>
