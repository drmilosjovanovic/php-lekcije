<?php
ini_set('display_errors','Off');
ini_set('error_reporting', E_ERROR);

// Controllers
use Levelup\App\Controllers\Home;
use Levelup\App\Controllers\AboutUs;
use Levelup\App\Controllers\Contact;
use Levelup\App\Controllers\Register;

// Services
use Levelup\App\Services\Calculator;
use Levelup\App\Services\Auth\Security;

// Exceptions
use Levelup\App\Exceptions\DatabaseException;

require 'vendor/autoload.php';

try {

    // prevent error with empty `page` parameter
    if(!isset($_GET['page'])) {
        $_GET['page'] = 'home';
    }

    // routing
    switch($_GET['page']) {

        // About Us page
        case "about-us":
            $page = new AboutUs();
            $page->index();
            break;

        // Contact page
        case "contact":
            $page = new Contact();
            $page->index();        
            break;

        // Register page
        case "register":

            $page = new Register();        

            if(count($_POST) == 0) {
                // display register form
                $page->index();  
            } else {
                // store user & display success page
                $page->storeUser();
            }
            break;

        // Home page
        default:
            $page = new Home();
            $page->index();
    }

} catch(DatabaseException $exception) {

    $page = new Home();
    $page->showDatabaseError($exception->getMessage());      

} catch(\Exception $exception) {

    $page = new Home();
    $page->showError($exception->getMessage());    

}