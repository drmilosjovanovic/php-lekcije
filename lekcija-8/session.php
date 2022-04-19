<?php
session_start();

$_SESSION['logged'] = true;

if($_SESSION['logged']) {
    echo "Welcome user";
} else {
    echo "Welcome anonymous";
}

// session_destroy();

?>