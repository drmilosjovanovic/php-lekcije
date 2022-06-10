<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// config copied from mailtrap.io
$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = '1871c3cd9b1df0';
$phpmailer->Password = '8a934139877113';
// end of config

// custom values
$phpmailer->From = "antonije@gmail.com";
$phpmailer->FromName = "Antonije Nojic";
$phpmailer->addAddress("nevena@gmail.com", "Nevena");
$phpmailer->isHTML(true);
$phpmailer->Subject = "Ovo je test email poslat Neveni";
$phpmailer->Body = "<b>Ovo je test bold text</b><i>Ovo je italic text</i>";

$phpmailer->send();

echo "Mail has been sent";


