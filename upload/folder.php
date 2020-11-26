<?php
// change the name below for the folder you want
$dir = "Utilisateur";

$file_to_write = 'test.txt';
$content_to_write = "The content";

if( is_dir($dir) === false )
{
    mkdir($dir);
}

$file = fopen($dir . '/utilisateur' . $file_to_write,"w");

// a different way to write content into
// fwrite($file,"Hello World.");

fwrite($file, $content_to_write);

// closes the file
fclose($file);

// this will show the created file from the created folder on screen
include $dir . '/views' . $file_to_write;

?>