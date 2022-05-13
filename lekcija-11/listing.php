<html>
    <head>
        <style>
            table, th, td {
                border: black 1px solid;
            }
        </style>
    </head>
    <body>

    <?php
    // connect to mysql database
    $connection = mysqli_connect("localhost","root","","my_database");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

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
                </tr>
            <?php
            
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?> </td>
                    <td><?php echo $row['email']; ?> </td>
                    <td><?php echo $row['creation_date']; ?> </td>
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
    ?>

</body>
</html>