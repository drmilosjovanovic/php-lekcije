<?php

$connection = dbConnect();
$sql1 = "SELECT id, email, creation_date FROM `mailing_list`";
$result = mysqli_query($connection, $sql1);

if ($result) {

    // check if there is at least one email address in the DB
    if (mysqli_num_rows($result) == 0) {

        die("There are no email addresses in the DB");

    } else {

        if(isset($_GET['success']) && $_GET['success'] == 1) {
            echo "You have successfully updated email address";
        }

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
                <td>
                    <a href="index.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $row['id']; ?>">Delete</a>
                </td>
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