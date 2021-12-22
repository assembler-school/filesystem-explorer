<?php

if (isset($_GET['submitBuscar'])) {
    $path = './root';
    //echo  'este e no if ='.$_GET['buscar'].'<br>';
    //$procurar = scandir($path);
    searchFile($path);
    //search2($path);
}

function searchFile($dir)
{
    $it = new RecursiveTreeIterator(new RecursiveDirectoryIterator("./root", RecursiveDirectoryIterator::SKIP_DOTS));
    foreach ($it as $path) {
        //echo $path . "<br>" . $_GET['buscar'];
        $var = preg_match('*\b' . preg_quote($_GET['buscar']) . '\b*i', $path);
        echo 'kkkkkk -> '. $var;
        return $var;
    }

    // $newDir =  new DirectoryIterator($dir);
    // foreach($newDir as $each){
    //     if (is_file( $each) ) {
    //         echo'111111111111';
    //     }else{
    //         foreach (glob($each) as $file){
    //             echo $file;
    //         }
    //     }
    // }
    //echo $_GET['buscar']."<br>";
    //echo 'esto es dir'. $newDir->getFileInfo()."<br>";
    //echo $newDir->getFilamene()."<br>";
    // if (is_file($newDir)) {
    //     if ($_GET['buscar'] == $newDir->getFilename()) {
    //         echo '11<br>';
    //     }
    // } else {
    //     foreach (glob(rtrim($newDir, '/') . '/*', GLOB_NOSORT) as $each) {
    //         if (is_file($each)) {
    //             if ($_GET['buscar'] == $each->getFilename()) {
    //                 echo '22<br>';
    //             }
    //         } else {
    //             echo '33 <br>';
    //             //echo $each;
    //             searchFile($each);
    //         }
    //     }
    // }
};

function search2($drirec)
{
    $allfiles = scandir($drirec);
    print_r($allfiles);

    foreach ($allfiles as $file) {
        echo $file . "<br>" . $_GET['buscar'] . "<br>";
        foreach ($file as $fileFile) {
            print_r($fileFile);
            //echo $fileFile ."<br>". $_GET['buscar']."<br>";
            if (strstr($fileFile, $_GET['buscar'])) {
                echo "file found";
            }
        }
    }
}
