<?php

namespace Levelup\App\Models;

class Common {

    public function dbConnect() {
        // logic for DB connection...
    }

    public function getAll($tableName) {

        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($connection, $sql);

        if(!$result) {
            die('Error has occurred');
        } else {
            return $result;
        }        

    }

}