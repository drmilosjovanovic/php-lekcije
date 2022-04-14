<?php
echo "<pre>";
function printArrayMembers($arr) {

    if(is_array($arr)) {
        foreach($arr as $value) {
            
            if(is_array($value)) {
                printArrayMembers($value);
            } elseif(is_string($value)) {
                echo $value . "<br />";
            } elseif(is_integer($value)) {
                echo $value . "<br />";
            } else {
                // do nothing
            }
        }
    } 
}

$array = array (
    
    'grad' => 'nis',
    'banca' => 'intesa',
     'kredit' => [
         12 , 
         24 , 
         36
        ],
    'vrsta' => [
        'gotovinski',
        'bezkamatni'
    ], 

);

printArrayMembers($array);

