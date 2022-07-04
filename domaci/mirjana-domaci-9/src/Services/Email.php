<?php

namespace Levelup\App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Email {

  public function send($message) {

    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '84a015ab1dec06';
    $phpmailer->Password = 'e522d66284a72d';

    $phpmailer->From = "kata@gmail.com";
    $phpmailer->FromName = $_POST['name'];
    $phpmailer->addAddress("kata@gmail.com", "kata");
    $phpmailer->isHTML(false);
    $phpmailer->Body = $_POST['message'];

    $phpmailer->send();


     
  
    }

  }
