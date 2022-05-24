<?php

require_once('config.php');
require_once('functions.php');

$connection = dbConnect();

$id = $_POST['id'];
$email = $_POST['email'];

$sql = "UPDATE mailing_list SET email = '$email' WHERE id = '$id'";
$result = mysqli_query($connection, $sql);

if ($result) {
    
    header("Location: index.php?success=1");

} else {
    die("Error has occurred");
}