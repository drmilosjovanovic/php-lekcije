<?php
echo "<pre>";
if(count($_POST) > 0) {
    // do processing
    print_r($_POST);
} else {
    echo "Invalid URL";
}