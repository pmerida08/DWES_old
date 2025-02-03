<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>

<body>

    <form action="" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="subject" placeholder="Subject">
        <textarea name="message" placeholder="Message"></textarea>
        <input type="submit" value="Send">
    </form>

    <?php
    $to = "a21mevepa@iesgrancapitan.org";
    $subject = "Prueba desde XAMPP con Gmail";
    $message = "Este es un correo de prueba enviado desde XAMPP utilizando Gmail.";
    $headers = "From: pablomerida03@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Correo enviado con éxito.";
    } else {
        echo "Error al enviar el correo.";
    }
    ?>


</body>

</html>