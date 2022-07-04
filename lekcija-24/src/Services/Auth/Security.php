<?php

namespace Levelup\App\Services\Auth;

use Levelup\App\Models\Users;

class Security {

    public function login($username, $password) {
        
        $usersModel = new Users();

        if(is_array($usersModel->getByUsernameAndPassword($username, $password))) {
            return true;
        }

        return false;        
    }

    public function validatePassword(): bool {

        if(strlen($_POST['password']) < 6) {
            return false;
        }

        if($_POST['password'] != $_POST['passwordConfirm']) {
            return false;
        }

        return true;
    }    

    public function isLoggedIn() {

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            return true;
        } else {
            return false;
        }

    }    

}