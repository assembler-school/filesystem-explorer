<?php
// if(isset($_POST)){
//     $namefolder= $_POST["folderName"];
//     createNewFolder();
// }


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

    //print_r($_POST);
    // echo $_POST['create'];
    // echo $_POST['type'];

}


// if(isset($_POST["prueba"])){
//     $namefile= $_POST["prueba"];
//     fopean();
// }
function fopean()
{
    global $namefile;
    global $typefile;
    global $fileroot;

    try {
        $newFileName = "./root/$fileroot/$namefile$typefile";
        // print $newFileName;
        $content = "";
        $file = fopen($newFileName, "w+");
        fwrite($file, $content);
        header('location: ./index.php');
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
}
