<?php
<<<<<<< HEAD
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
=======

if (isset($_POST["searchWords"])){
    $searchWord2 = $_POST["searchWords"];
    header("Location:../index.php?search=$searchWord2");
}else{
    function searchFilesFun($ruta , $searchWord){
        $gestor = opendir($ruta);
        echo "<ul class='fa-ul'>";
        while (($archivo = readdir($gestor)) !== false)  {
            $ruta_completa = $ruta . "/" . $archivo;
            $pattern = "/$searchWord/i";
            if ($archivo != "." && $archivo != "..") {
                if (is_dir($ruta_completa)) {
                        if(preg_match($pattern, $archivo) == 1){
                            echo "<li class='foldersTitle'>
                        <i class='fa-li fas fa-folder'></i>
                        <a class='linkStyles' href='./index.php?root=$ruta_completa'>$archivo</a>
                    </li>";}
                            searchFilesFun($ruta_completa,$searchWord);
                } else {
                    if(preg_match($pattern, $archivo) == 1){
                        require_once("./modules/whatEsxtension.php");
                    isaFolder($archivo,$ruta);
                    }
                }
            }
        }
        // Cierra el gestor de directorios
        closedir($gestor);
        echo "</ul>";
        //header("Location:../index.php?stop=1");
    }
}
>>>>>>> c6626b0516d5b8d80cc72bd60ae1b126270c6a25

// $searchDir = scandir("../root");
// print_r($searchDir);



