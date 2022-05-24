<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Login forma</title>
</head>
<body>

    <?php


    require_once('config.php');
    require_once('functions.php');

    $error = "";

    // logout logic
    if(isset($_GET['logout']) && $_GET['logout'] == 1) {
        session_unset();
        session_destroy();
    }

    // delete logic
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {

        $connection = dbConnect();

        $id = $_GET['id'];
        $sql = "DELETE FROM mailing_list WHERE id = '$id';";
        $result = mysqli_query($connection, $sql);        
    }    

    // login logic
    if(count($_POST) > 0) {
        if(userExist($_POST['username'], $_POST['password'])) {
            echo "You have succesfully logged in.";
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $_POST['username'];
        } else {
            $error = "Invalid username/password."; 
            session_destroy();
        } 
    }      
    
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

        // login form
        include('login.php');
    } else {

        echo "Welcome, " . $_SESSION['username'] . " [<a href='index.php?logout=1' >Logout</a>] <br /><br />";
        
        // edit logic
        if(isset($_GET['action']) && $_GET['action'] == 'edit') {
            include('edit.php');
        } else {
            // table listing
            include('listing.php');   
        }
    }
    ?>
</body>
</html>