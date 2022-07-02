<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;

class Home {

    public function index() {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/home.php');
        include('src/Views/footer.php');
    }

    public function showError($error) {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/error.php');
        include('src/Views/footer.php');
    }


    public function showDatabaseError($error) {

        $securityService = new Security();

        include('src/Views/header.php');
        include('src/Views/database-error.php');
        include('src/Views/footer.php');
    }    
}