<?php

namespace Levelup\App\Services;

class File {

    public function upload($file, $fileName) {

        $filePath = 'upload/' . $fileName;

        \move_uploaded_file($file["tmp_name"], $filePath);

        return true;
    }
}