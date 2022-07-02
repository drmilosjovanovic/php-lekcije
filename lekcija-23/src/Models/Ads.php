<?php

namespace Levelup\App\Models;

use Levelup\App\Models\Users;

class Ads extends Common {

    public function insert($data) {

        $username = $data['username'];

        $usersModel = new Users();
        $id = $usersModel->getIdByUsername($username);

        $phoneNumber = $data['phoneNumber'];
        $decription = $data['description'];
        $fileName = $data['fileName'];

        $sql = "INSERT INTO `ads` (`id`, `user_id`, `phone_number`, `description`, `fileName`, `creation_date`) VALUES (NULL, '$id', '$phoneNumber', '$decription', '$fileName', current_timestamp());";

        $this->query($sql);
    }
}