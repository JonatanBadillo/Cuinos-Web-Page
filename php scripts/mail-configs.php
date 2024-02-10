<?php
namespace PHPMailer\PHPMailer;

use PHPMAILER\PHPMailer\PHPMailer;
use PHPMAILER\PHPMailer\Exception;
use PHPMAILER\PHPMailer\SMTP;

require_once('vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('vendor/phpmailer/phpmailer/src/Exception.php');

$username = "pruebas@cuinos.castelancarpinteyro.com";
$password = "CuinosMailSender24!!";

$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = "cuinos.castelancarpinteyro.com"; //dominio o subdominio
$mail->SMTPSecure = 'TLS';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = $username;
$mail->Password = $password;
$mail->From = $username;
$mail->FromName = "Cuinos - Newsletter";
$mail->CharSet = "UTF-8";

// Aquí termina configuración

// Aquí empieza código para enviar (comentado para que la configuración se pueda importar en otros códigos, y envíe cosas de forma dinámica)
/*
$mail->ClearAllRecipients();
$mail->AddAddress("dantecc10@gmail.com");
$mail->AddAddress("jonatanbadillo.19@gmail.com");
$mail->AddCC("dante@castelancarpinteyro.com");
$mail->IsHTML(true);  // Podemos activar o desactivar HTML en el mensaje
$mail->Subject = 'Prueba de envío de correo desde Cuinos.';

$msg = ("<h1>Envío exitoso</h1>
            <p>Si este mensaje es visible, la configuración de correo en subdominio para Cuinos fue exitosa.</p>
            ");

$mail->Body = $msg;

try {
    $mail->Send();
    // Resto del código...
    echo ("Correo enviado 'con éxito'");
} catch (Exception $e) {
    echo "Error al enviar el correo electrónico: " . $mail->ErrorInfo;
    echo "Excepción lanzada: " . $e->getMessage();
}
*/