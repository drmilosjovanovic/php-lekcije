<?php

namespace Levelup\App\Models;

class Users extends Common {

    public function get() {

        $sql = "SELECT * FROM `users`;";

        $result = $this->query($sql);

        $users = [];
        while($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        return $users;
    }

    public function insert($data) {

        $fullName = $data['fullName'];
        $username = $data['username'];
        $password = $data['password'];

        $sql = "INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `creation_date`) VALUES (NULL, '$fullName', '$username', '$password', current_timestamp());";

        $this->query($sql);
    }

    public function delete($id) {

        $sql = "DELETE FROM `users` WHERE id = $id";

        $this->query($sql);
    }
}