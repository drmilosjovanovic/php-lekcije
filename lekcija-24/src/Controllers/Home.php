<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Models\Ads;

class Home {

    public function index() {

        $securityService = new Security();

        $adsModel = new Ads();
        $ads = $adsModel->getActiveAds();

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