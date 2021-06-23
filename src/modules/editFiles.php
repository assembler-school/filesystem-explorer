<?php

$rootPath = "./root";


if (isset($_GET["rename"], $_GET["to"])) {
}


function renameFiles($oldName, $newName)
{
    return (!file_exists($newName) && file_exists($oldName)) ? rename($oldName, $newName) : null;
}



function sendMessage()
{

    // modal bootstrap
}

function downloadFile()
{
}
