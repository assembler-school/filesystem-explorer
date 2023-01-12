<?php

if(empty($_POST["name-folder"]) === false) {
// if (preg_match(["a-zA-Z"], $_POST['nombre']) === 0) {
//     echo ("El nombre del directorio no es valido");
//     }else {
        
    if (file_exists($_POST["name-folder"]) === true) {
        @mkdir("root/" . $_POST["name-folder"], 0777) === false;
        
    }
}
       


// if (file_exists($_POST["name-folder"]) === true) {
//     echo "Folder exist!";
    
// }else {
//     if(@mkdir("root/" . $_POST["name-folder"], 0777) === false) {
//         echo "Folder doesn't exist";
//     }
// }
// }


// if (file_exists($_POST["name-folder"]) === true) {
//     echo "Folder exist!";
    
// }else {
//     if(@mkdir("root/" . $_POST["name-folder"], 0777) === false) {
//         echo "lo que sea";
//     }
// }





?>