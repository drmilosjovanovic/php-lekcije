<?php

namespace Levelup\App\Controllers;

use Levelup\App\Models\MailingList;

class Home {

    public function index() {

        include('src/Views/header.php');
        include('src/Views/home.php');
        include('src/Views/footer.php');
    }
}