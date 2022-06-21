<?php

namespace Levelup\App\Controllers;

use Levelup\App\Models\Users;

class Register {

    public function index() {

        $errors = '';

        include('src/Views/header.php');
        include('src/Views/register.php');
        include('src/Views/footer.php');
    }

    public function storeUser() {

        if(!$this->validatePassword()) {

            $errors = 'You have entered wrong password';

            include('src/Views/header.php');
            include('src/Views/register.php');
            include('src/Views/footer.php');     

        } else {
        
            $userData = [
                'fullName' => $_POST['fullName'],
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];

            $usersModel = new Users();
            $usersModel->insert($userData);

            include('src/Views/header.php');
            include('src/Views/register-success.php');
            include('src/Views/footer.php');                 
        }

    }

    protected function validatePassword(): bool {

        if(strlen($_POST['password']) < 6) {
            return false;
        }

        if($_POST['password'] != $_POST['passwordConfirm']) {
            return false;
        }

        return true;
    }
}