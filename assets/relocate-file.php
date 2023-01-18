<?php

$fileToMove  = $_GET['filepath']; //atrubito de boton "restore" en popUp, pasamos por fetch

$nameFolder = $_GET['folderName']; //value of prompt

$lastSlash = strrpos($fileToMove, "/");
$fileName = substr($fileToMove, $lastSlash); 

$redirectNoFile = substr($fileToMove, 0, $lastSlash);
$redir = str_replace("../root/", "", $redirectNoFile);

if(rename($fileToMove, '../root/'.$nameFolder.'/'.$fileName)){
    $status['code'] = 200;
    $status['redir'] = $redir;
}else{
    $status['code'] = 500;
    $status['msg'] = 'We couldnt move the file';
}

echo json_encode($status);
?>