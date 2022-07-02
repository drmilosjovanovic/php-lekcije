<?php

namespace Levelup\App\Controllers;

use Levelup\App\Services\Auth\Security;

class Login {

    public function index() {

        $securityService = new Security();
        
        $errors = '';        

        include('src/Views/header.php');
        include('src/Views/login.php');
        include('src/Views/footer.php');
    }

    public function loginUser() {

        $securityService = new Security();        

        $username = $_POST['username'];
        $password = $_POST['password'];        
        
        if($securityService->login($username, $password)) {

            // login success
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            Header('Location: index.php'); // do redirect

        } else {
            // login failed
            $errors = 'You have entered wrong username/password';        

            include('src/Views/header.php');
            include('src/Views/login.php');
            include('src/Views/footer.php');            
        }
    }
}