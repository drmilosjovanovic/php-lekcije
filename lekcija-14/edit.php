<?php

$connection = dbConnect();
$id = $_GET['id'];
$sql = "SELECT id, email FROM `mailing_list` WHERE id = '$id'";
$result = mysqli_query($connection, $sql);

if ($result) {

    // check if there is exactly one entry for that ID
    if (mysqli_num_rows($result) != 1) {

        die("Invalid email address ID");

    } else {
        $row = mysqli_fetch_assoc($result);       
    }
}
?>

<form action="update.php?id=<?php echo $row['id']?>" method="POST">
    Email: <br />
    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
    <input type="text" name="email" value="<?php echo $row['email']?>"/><br /><br />
    <input type="submit" value="Save" />
</form>