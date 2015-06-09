<?php 
if(isset($_POST['submit'])){
    $to1 = "handres@degrisdigital.com"; // this is your Email address
    $to2 = "uninpahu@uninpahu.edu.co";
    $from = $_POST['email']; // this is the sender's Email address
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $carreras = $_POST['carreras'];
    $subject = "Información formulario contacto Landing";
    $message = "Nombre: ".$nombre . " Telefono: " . $telefono . " Programa de interes:" . $carreras . "\n\n" . $_POST['message'];
    $message2 = "Copia información formulario contacto Landing" . $nombre . "\n\n" . $_POST['message'];

    $headers = "From:" . $to1;
    $headers2 = "From:" . $to2;
    mail($to1,$subject,$message,$headers);
    mail($to2,$subject,$message2,$headers2); // sends a copy of the message to the sender
    ('Location: ./gracias.html');
    }
?>
<?php 