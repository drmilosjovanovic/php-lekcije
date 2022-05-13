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

function validateEmailAddress(string $email): bool {

    if (!empty($email)) {

        // split email address in two segments
        $emailParsed = explode('@', $email);
    
        if(count($emailParsed) != 2) {
          return false;
        }
    
        // split domain in two segments
        $domainParsed = explode('.', $emailParsed[1]);
    
        if(count($domainParsed) != 2) {
          return false;
        }

    } else {
        return false;
    }

    return true;
}

function validateUsername(string $username): bool {

    if(strlen($username) < 5) {
        return false;
    } 

    return true;
}

function isUsernameUnique(string $username): bool {

    $connection = dbConnect();

    $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");

    if($result) {
        if(mysqli_num_rows($result) > 0) {
            return false;
        }
    }

    return true;
}

function validatePassword(string $password, string $passwordRepeat): bool {

    if(strlen($password) < 3 || $password != $passwordRepeat) {
        return false;
    } 

    return true;
}

function storeUser(string $username, string $password, string $email): bool {

    $connection = dbConnect();
    
    $result = mysqli_query($connection, "INSERT INTO `users` (`id`, `username`, `password`, `email`, `creation_date`) VALUES (NULL, '$username', '$password', '$email', current_timestamp()); ");

    if($result) {
        return true;
    }

    return false;
}