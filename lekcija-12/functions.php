<?php
function dbConnect() {

    $database = CONFIG['database'];
    
    $connection = mysqli_connect($database['server'], $database['username'], $database['password'], $database['db_name']);

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    return $connection;
}


function userExist(string $username , string $password): bool {

    $connection = dbConnect();

    $result = mysqli_query($connection, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            return true;
        }
    }

    return false;
}


