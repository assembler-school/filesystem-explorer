<?php 



if (isset($_POST['submit'])) {

    $fileName = $_POST['file'];
    $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("webdictionary.txt"));
    fclose($myfile);

  
}