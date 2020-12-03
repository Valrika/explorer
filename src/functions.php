<?php

function debug($variable){
    echo '<pre>' . print_r($variable, true) . '';;
}


function str_random($lengh){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $lengh)), 0, $lengh);
}




