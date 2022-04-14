<?php

require_once('functions.php');

if(count($_POST) > 0) {
    // form is submitted
    if(checkLogin($_POST['username'], $_POST['pass'])) {
        // logged in
        echo "Vi ste se uspesno ulogovali!!!";
        storeLoginLog();
    } else {
        // not logged in
        echo "Login nije uspeo!!!";
    }
}

?>

<html>
    <head>
        <title>Moja prva forma</title>
    </head>
    <body>
        <form action="test.php" method="POST">
            <input type="text" name="username" placeholder="Korisnicko ime"/><br />
            <input type="password" name="pass" placeholder="Lozinka"/> <br />
            <input type="radio" name="account_type" value="admin"> Admin
            <input type="radio" name="account_type" value="standardni korisnik"> Standard User<br />
            <input type="submit" value="Login" />
        </form>
    </body>
</html>