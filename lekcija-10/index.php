<html>
<head>
    <title>Mailing list</title>
</head>
<body>
<?php
if(count($_POST) > 0) {

  $email = $_POST['email'];

  // check if email is empty
  if (!empty($email)) {

    // split email address in two segments
    $emailParsed = explode('@', $email);

    if(count($emailParsed) != 2) {
      die('You have entered an invalid email address!');
    }

    // split domain in two segments
    $domainParsed = explode('.', $emailParsed[1]);

    if(count($domainParsed) != 2) {
      die('You have entered an invalid email address!');
    }

    // connect to mysql database
    $connection = mysqli_connect("localhost","root","","my_database");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    // var_dump($email);die();

    $sql1 = "SELECT * FROM `mailing_list` WHERE `email` = '$email'";
    $result = mysqli_query($connection, $sql1);

    if ($result) {

      // check if email address already exists in the DB
      if (mysqli_num_rows($result) > 0) {

        echo "Entered email address already exists in the database";
        exit();

      } else {
        
        // store email address into the database
        $sql2 = "INSERT INTO `mailing_list` (`id`, `email`, `creation_date`) VALUES (NULL, '$email', current_timestamp());";
        $insertResult = mysqli_query($connection, $sql2);

        if($insertResult) {
          echo "Thanks for subscribing to our mailing list";
        }
      }      


    } else {
      echo "Error: " . mysqli_error($connection);
    }    

  } else {
    echo 'Vasa mail adresa je pogresna (' . $_POST['email'] . ')';
  } 
} else {
?>
    <form action="index.php" method="POST">
    <p>Unesi svoju e-mail adresu i klik na Subscribe!</p>
    <p>E-mail:<input type="email" name="email" id="email" required> </br> </br>
    <input type="submit" value="Subscribe"> </br>    
    </form>
    </body>
<?php
}
?>

</html>