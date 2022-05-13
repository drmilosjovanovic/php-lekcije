<html>
<head>
    <title>Register</title>
    <style>
        .form-holder {
            text-align: center;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            border: black 1px solid;
        }

        .errors {
            color: red;
        }

        .success {
            color: green;
        }        
    </style>
</head>
<body>

<?php
require_once('config.php');
require_once('functions.php');

    $errors = '';
    $success = '';

    if(count($_POST) > 0) {
        if(validateUsername($_POST['username'])) {
            if(isUsernameUnique($_POST['username'])) {
                if(validatePassword($_POST['password'], $_POST['password_repeat'])) {
                    if(validateEmailAddress($_POST['email'])) {
                        
                        // store user into the DB
                        if(storeUser($_POST['username'], $_POST['password'], $_POST['email'])) {
                            $success .= 'User has been successfully registered.';
                        } else {
                            $errors .= 'An error has occurred. <br />';
                        }

                    } else {
                        $errors .= "Email is not valid";
                    }                             
                } else {
                    $errors .= "Password does not match the confirmation or is not valid";
                }                        
            } else {
                $errors .= "Username already exists in the database";
            }
        } else {
            $errors .= "Username is not valid. Username must be at least 5 letters.";
        }
    }
 
?>    
<div class="form-holder">
    <form action="register.php" method="POST">
        <p>Enter username:</p>
        <input type="text" name="username" id="username" required><br />
        <p>Enter password:</p>
        <input type="password" name="password" id="password" required><br />        
        <p>Confirm password:</p>
        <input type="password" name="password_repeat" id="password_repeat" required><br />                   
        <p>E-mail:</p>
        <input type="email" name="email" id="email" required> </br> </br>
        <p class="errors"><?php echo $errors; ?></p>
        <p class="success"><?php echo $success; ?></p>        
        <input type="submit" value="Register"> </br>    
    </form>
</div>
</body>    
</html>