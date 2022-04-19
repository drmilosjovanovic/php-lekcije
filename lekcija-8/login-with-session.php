<?php
session_start();

if(count($_POST) > 0) {
  if($_POST['username'] == 'milos' && $_POST['password'] == '12345') {
      $_SESSION['logged_in'] = true;
  } else {
      echo "Login failed" . "<br />";
  }
}
?>
<html>
    <head>
        <title>My sample login page</title>
    </head>
    <body>

        <?php
        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
        ?>
        <h1>Please login to continue</h1>
        <?php
        }
        ?>


        <?php
            if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
        ?>
            <form action="login-with-session.php" method="POST">
                Username: <input type="text" name="username" placeholder="Enter your username" /><br />
                Password: <input type="password" name="password" placeholder="Enter password" /><br />
                <input type="submit" value="Login" />
            </form>
        
        <?php } else { ?>

                <h2>Welcome, Milos Jovanovic</h2>

        <?php } ?>
    </body>
</html>