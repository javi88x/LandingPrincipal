<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nombre']) ||
	!isset($_POST['telefono']) ||
	!isset($_POST['email']) ||
	!isset($_POST['carreras'])){

	echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
	echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
	die();
}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'rsb25.rhostbh.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'javier@gersonjaimes.com';                 // SMTP username
$mail->Password = 'live6523018';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'javier@gersonjaimes.com';
$mail->FromName = 'Andres Degris';
$mail->addAddress('ingfranciscodonado@gmail.com', 'Francisco Donado');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');


$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Informacion Landing Page';
$mail->Body    .= "<b>Nombre:</b> " . $_POST['nombre'] . "\n";
$mail->Body    .= "<b>E-mail:</b> " . $_POST['email'] . "\n";
$mail->Body    .= "<b>Teléfono:</b> " . $_POST['telefono'] . "\n";
$mail->Body    .= "<b>Carrera de interes:</b> " . $_POST['carreras'] . "\n\n";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
header ("Location: ../gracias.html");
}
?>