<?php
// Validar que se envió por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

    // Email de destino
    $destino = "contacto@woofapp.com.ar";
    $asunto = "Nuevo registro para acceso anticipado";

    // Cuerpo del mensaje
    $mensaje = "Has recibido un nuevo registro:\n\n";
    $mensaje .= "Nombre: $nombre\n";
    $mensaje .= "Correo: $correo\n";

    // Cabeceras del email
    $headers = "From: no-responder@woofapp.com.ar\r\n";
    $headers .= "Reply-To: $correo\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar email
    if (mail($destino, $asunto, $mensaje, $headers)) {
        // Redirigir a página de gracias
        header("Location: gracias.html");
        exit();
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

