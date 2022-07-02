<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;
use Levelup\App\Services\Ads;
use Levelup\App\Models\Ads as AdsModel;
use Levelup\App\Services\File;

class CreateAd {

    public function index() {
        
        $securityService = new Security();

        $errors = '';

        include('src/Views/header.php');
        include('src/Views/create-ad.php');
        include('src/Views/footer.php');        

    }

    public function storeAd() {

        $securityService = new Security();

        $adsService = new Ads();

        $errors = '';        

        if(!$adsService->validateAdPhoneNumber($_POST['phoneNumber'])) {
            $errors .= 'Please enter valid phone number <br />';
        }

        if(!$adsService->validateAdDescription($_POST['description'])) {
            $errors .= 'Please enter valid description <br />';
        }

        if(!empty($errors)) {
            include('src/Views/header.php');
            include('src/Views/create-ad.php');
            include('src/Views/footer.php'); 
        } else {

            // detect file extension
            $baseName = basename($_FILES["myFile"]["name"]);
            $extension = pathinfo($baseName, PATHINFO_EXTENSION);

            // instantiate File service
            $file = new File();
            $fileName = rand(9999,999999999) . "." . $extension; // generate random file name
            $file->upload($_FILES["myFile"], $fileName); // call method from service

            $adData = [
                'username' => $_SESSION['username'],
                'phoneNumber' => $_POST['phoneNumber'],
                'description' => $_POST['description'],
                'fileName' => $fileName
            ];

            $adsModel = new AdsModel();
            $adsModel->insert($adData);

            include('src/Views/header.php');
            include('src/Views/create-ad-success.php');
            include('src/Views/footer.php');             
        }

    }
}