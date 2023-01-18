<?php

if(!isset($_SESSION)){
    session_start();
}

// $root = $_SESSION['absPath'];

// function showSearch(){
//     if (isset($_POST['search'])) {

//         // $celulas = explode(',', $_POST['name-search']);
//         // $query_search = $_SESSION['absPath'];
//         // for ($i=0; $i<count($celulas); $i++) {
//         //     if ($i == 0)
//         //         $query_search .= 'dni = "'.$celulas[$i].'"';
//         //     else
//         //         $query_search .= ' OR dni = "'.$celulas[$i].'"';
//         // }

//         $path  = '/root'; 
//         $files = array_diff(scandir($path), array('.', '..')); 
//         echo $file;
//         // Arreglo con todos los nombres de los archivos
//         $files = array_diff(scandir($path), array('.', '..')); 
        
//         // Obtienes tu variable mediante GET
//         $code = $_GET['name-search'];
        
//         foreach($files as $file){
//             // Divides en dos el nombre de tu archivo utilizando el . 
//             $data = explode(".", $file);
//             // Nombre del archivo
//             $fileName = $data[0];
//             // Extensión del archivo 
//             $fileExtension = $data[1];
        
//             if($code == $fileName){
//                 echo $fileName;
//                 // Realizamos un break para que el ciclo se interrumpa
//                 break;
//             }
//         }
// }



// }

// $folder = "root";
// $results = array();
// $handle = opendir($folder);
// while ($file = readdir($handle)) {
//     if ($file != '.' && $file != '..') {
//         $results[] = $file;
//     }
// }
// closedir($handle);

// function showSearch(){

//     if (isset($_POST['search'])) {
//         // include 'scan.php';
//         $search = $_POST['search'];
//         $results = array_filter($results, function($value) use ($search) {
//             return strpos($value, $search) !== false;
//         });
//         foreach ($results as $result) {
//             echo $result . "<br>";
//         }
//     }
// }


?>