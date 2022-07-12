<?php

namespace Levelup\App\Services;

class File {

    const ALLOWED_IMAGE_TYPES = ['jpg', 'png', 'jpeg'];

    public function upload($file, $fileName) {

        $filePath = 'upload/' . $fileName;

        \move_uploaded_file($file["tmp_name"], $filePath);

        return true;
    }

    public function validateImage($extension) {

        if(in_array($extension, self::ALLOWED_IMAGE_TYPES)) {
            return true;
        }

        return false;
    }
}