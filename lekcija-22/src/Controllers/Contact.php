<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;

class Contact {

    public function index() {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/contact.php');
        include('src/Views/footer.php');
    }

}