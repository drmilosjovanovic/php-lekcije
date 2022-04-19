<?php

$myFile = fopen('data.txt', 'a');

$myText = "This is third sample text \n";

fwrite($myFile, $myText);

echo "Text successfully written";