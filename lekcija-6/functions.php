<?php

function checkLogin(string $username, string $password): bool {

    if($username == 'milos' && $password == '12345') {
        return true;
    } else {
        return false;
    }

}

function storeLoginLog() {
    // code for storing
    // ...
}