<?php
echo "<pre>";
file_put_contents('testfile.txt', "This is a sample data \n", FILE_APPEND);

echo file_get_contents('testfile.txt');