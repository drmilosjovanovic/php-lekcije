<?php

namespace Levelup\App\Models;

class Common {

    public function dbConnect() {
        
        $connection = mysqli_connect('localhost','root','','mali_oglasi');

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }        

        return $connection;
    }

    protected function query($sql) {

        $connection = $this->dbConnect();

        $result = mysqli_query($connection, $sql);
        if(!$result) {
            die('Error has occurred in SQL query');
        }
        
        return $result;
    }        
}