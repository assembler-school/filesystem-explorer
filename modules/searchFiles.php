<?php
// $searchWord = $_GET["searchWords"];

// $searchDir = scandir("../root");
// print_r($searchDir);

// function searchFilesFun($searchWord){
//     $ruta = "../root";
//     $gestor = opendir($ruta);
//     echo "<ul class='fa-ul'>";
//     while (($archivo = readdir($gestor)) !== false)  {
//         $ruta_completa = $ruta . "/" . $archivo;
//         if ($archivo != "." && $archivo != "..") {
//             if (is_dir($ruta_completa)) {
//                     if($archivo == $searchWord){
//                         echo "<li ><a class='linkStyles' href="."./index.php?root=$ruta_completa&fileName=$archivo".">$archivo</a></li>";
//                        }
//            generateFilesFun($ruta_completa);
//             } else {
//                if($archivo == $searchWord){
//                    echo "soy un archivo con ese nombre";
//                }
                
//             }
//         }
//     }
    // Cierra el gestor de directorios
    // closedir($gestor);
    // echo "</ul>";
// }







//header("Location:../index.php");