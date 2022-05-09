<html>
<head>
    <title>Drugi domaci</title>
</head>
<body>
<?php
if(count($_POST) > 0) {
  $email = $_POST['email'];
  if (!empty($email)) {

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


    // echo 'Hvala (' . $_POST['email'] . ') sto ste se Subscribe-ovali na nasu mail listu!';
  } else {
    echo 'Vasa mail adresa je pogresna (' . $_POST['email'] . ')';
  } 
} else {
?>
    <form action="index.php" method="POST">
    <p>Unesi svoju e-mail adresu i klik na Subscribe!</p>
    <p>E-mail:<input type="email" name="email" id="email"> </br> </br>
    <input type="submit" value="Subscribe"> </br>    
    </form>
    </body>
<?php
}
?>

</html>