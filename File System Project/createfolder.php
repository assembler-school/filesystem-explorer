<?php

function createNewFolder()
{
    global $namefolder;
    global $fileroot;

    if (!file_exists("./root/$fileroot/$namefolder")) {
        mkdir("./root/$namefolder", 0777, true);
        header("location: ./index.php");
    } else {
        header("location: ./index.php?error");
    }
}

if (isset($_POST['createForF'])) {
    if ($_POST['create'] == 'createFolder') {
        $namefolder = $_POST['filename'];
        $fileroot = $_POST['fileroot'];
        createNewFolder();
    } elseif ($_POST['create'] == 'createFile') {
        $namefile = $_POST['filename'];
        $typefile = $_POST['type'];
        $fileroot = $_POST['fileroot'];
        fopean();
    }
}


function fopean()
{
    global $namefile;
    global $typefile;
    global $fileroot;

    try {
        $newFileName = "./root/$fileroot/$namefile$typefile";
        $content = "";
        $file = fopen($newFileName, "w+");
        fwrite($file, $content);
        header('location: ./index.php');
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
}
