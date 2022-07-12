<?php

namespace Levelup\App\Models;

use Levelup\App\Models\Users;

class Ads extends Common {

    public function getOneById($id) {

        $sql = "SELECT * FROM `ads` WHERE id = '$id';";

        $result = $this->query($sql);

        $ad = mysqli_fetch_assoc($result);

        $users = new Users();
        $user = $users->getOneById($ad['user_id']);

        $ad['user_full_name'] = $user['full_name']; // append new array member

        return $ad;        
    }

    public function getActiveAds() {

        $sql = "SELECT * FROM `ads` WHERE creation_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) ORDER BY creation_date DESC;";

        $result = $this->query($sql);

        $ads = [];
        while($row = mysqli_fetch_assoc($result)) {
            $ads[] = $row;
        }

        return $ads;
    }    

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