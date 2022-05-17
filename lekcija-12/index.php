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
    ?>    
    <div class="login-form">
        <form action="index.php" method="POST">
            <h2>Login Form</h2>
                <div class="data">
                    <p>Enter username:</p>
                     <input type="text" name="username" id="username" required><br />
                </div>
                <div class="data">
                    <p>Enter password:</p>
                    <input type="password" name="password" id="password" required><br />        
                </div>
                <div class="submit">
                    <input type="submit" value="Login"> </br>
                </div>
                <p class="error"><?php echo $error; ?></p>     
        </form>
    </div>    
    <?php 
    } else {

        echo "Welcome, " . $_SESSION['username'] . " [<a href='index.php?logout=1' >Logout</a>] <br /><br />";
    
        $connection = dbConnect();
        $sql1 = "SELECT id, email, creation_date FROM `mailing_list`";
        $result = mysqli_query($connection, $sql1);
    
        if ($result) {
    
            // check if there is at least one email address in the DB
            if (mysqli_num_rows($result) == 0) {
    
                die("There are no email addresses in the DB");
    
            } else {
                ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Email address</th>
                        <th>Creation date</th>
                        <th>Action</th>
                    </tr>
                <?php
                
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['creation_date']; ?> </td>
                        <td><a href="index.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a></td>
                    </tr>
                <?php
                }
    
                ?>
                </table>
                <?php
            } 
    
        } else {
            echo "Error: " . mysqli_error($connection);
        }    
    }
    ?>
</body>
</html>