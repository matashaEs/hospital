<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "natali.babinska160@gmail.com";
$mail->Password = "adzo bthy uese pkxh";

function send_message($name, $surname, $result) {
    global $mail;
    $mail->setFrom('natali.babinska160@gmail.com', 'Szpital');
    $mail->addAddress('floral.flicker.candle@gmail.com');

    $mail->Subject = 'Wynik pacjenta';
    $mail->Body = 'Szanowny Jan Kowalski,
    Pacijent/pacijentka ' . $name . ' ' . $surname . ' wypełnił/a formularz z wynikiem ' . $result . ' Żeby zobaczyć szczegóły, proszę wejść na stronę szpitalu.';

    $mail->send();
};

?>