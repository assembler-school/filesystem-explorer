<?php
// function search(){
    
//     foreach (glob("root/h*") as $nombre_fichero) {
//         echo $nombre_fichero;
//     }
//     foreach (glob("root/*/h*") as $nombre_fichero) {
//         echo $nombre_fichero;
//     }
//     foreach (glob("root/*/*/h*") as $nombre_fichero) {
//         echo $nombre_fichero;
//     }

// }

// search();

$directoriesFolders = [];

function search2($e){
    global $directoriesFolders;
    foreach (glob($e) as $fichero){
        if (!strpos($fichero, '.')) {
            array_push($directoriesFolders, $fichero);
            search2($fichero . "/*");
        } else {
            array_push($directoriesFolders, $fichero);
     }
    }
    print_r($directoriesFolders);
    $findings = [];
    foreach ($directoriesFolders as $directory){
        if (strpos($directory, "ho")){
            array_push($findings, $directory);
        }
    }

    // print_r ($findings);
}

search2("root/*");
