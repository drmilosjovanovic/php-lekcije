<?php

namespace Levelup\App\Controllers;

class Home {

    public function index() {

            include('src/Views/header.php');
            include('src/Views/home.php');
            include('src/Views/footer.php');
    }

    public function showError($error) {

        include('src/Views/header.php');
        include('src/Views/error.php');
        include('src/Views/footer.php');
    }


    public function showDatabaseError($error) {

        include('src/Views/header.php');
        include('src/Views/database-error.php');
        include('src/Views/footer.php');
    }    
}