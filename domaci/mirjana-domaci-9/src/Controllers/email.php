<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Services\email;
use Levelup\App\Models\email as emailModel;

class CreateAd {

    public function index() {
        
        $securityService = new Security();

        $errors = '';

        include('src/Views/header.php');
        include('src/Views/email.php');
        include('src/Views/footer.php');        

    }
} 