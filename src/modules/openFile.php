<?php 

$target_dir = __DIR__;


if (isset($_POST['submit'])) {

    $fileName = $_POST['file'];
    echo $target_dir .'/root/'.$fileName;
    $myfile = fopen($target_dir .'/root/'.$fileName, "w+") or die("Unable to open file!");
    echo fread($myfile,filesize("webdictionary.txt"));
    fclose($myfile);

  
}