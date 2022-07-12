<?php

namespace Levelup\App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email {

    public function send($email, $message) {

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
        $phpmailer->From = "maramary@gmail.com";
        $phpmailer->FromName = "Marija Krstic";
        $phpmailer->addAddress("andjafandja@gmail.com", "Andjela");
        $phpmailer->isHTML(true);
        $phpmailer->Subject = "Mail has been sent Andjeli";
        $phpmailer->Body = $_POST['message'];        
        $phpmailer->send();
    }

}