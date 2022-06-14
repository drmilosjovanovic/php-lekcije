<?php

// Controllers
use Levelup\App\Controllers\Home;
use Levelup\App\Controllers\AboutUs;
use Levelup\App\Controllers\Contact;

// Services
use Levelup\App\Services\Calculator;
use Levelup\App\Services\Auth\Security;

require 'vendor/autoload.php';

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

    // Home page
    default:
        $page = new Home();
        $page->index();
}

