<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Services\Email;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Contact
{

    public function index()
    {
        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/contact.php');
        include('src/Views/footer.php');
    }

    public function sendMessage() {

        $securityService = new Security();        

        $email = new Email();
        $email->send($_POST['email'], $_POST['message']);

        include('src/Views/header.php');
        include('src/views/mail-sent-success.php');
        include('src/Views/footer.php');        
    }
}