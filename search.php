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


function search2($e){
    $directoriesFolders = array();
    foreach (glob($e) as $name_fichero){
        $fichero = $name_fichero;
        if (!strpos($fichero, '.')) {
            array_push($directoriesFolders, $fichero);
            search2($fichero . "/*");
        } else {
            array_push($directoriesFolders, $fichero);
     }
    }
    var_dump($directoriesFolders);
    $findings = array();
    foreach ($directoriesFolders as $directory){
        if (strpos($directory, "ho")){
            array_push($findings, $directory);
        }
    }

    // print_r ($findings);
}

search2("root/*");