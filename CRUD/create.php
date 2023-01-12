<?php


if (empty($_POST['nombre']) === false) {
    /* Si existe un archivo o directorio con ese nombre no lo sobreescribiremos */
    if (file_exists($_POST['nombre']) === true) {
      echo json_encode('El archivo o directorio ya existe');
    } else {
      if (@mkdir("root/" . $_POST['nombre'], 0777) === false) {
        echo json_encode('No se pudo crear el directorio');
      }
    }
  
}






// if(!isset($_POST['create'])){
//     $newFileName = "root/7-create-write-file.txt";
//     // $fileContent = 'This is the content of the "3-create-write-file.txt" file.';

//     // Now the file is created, but it's empty.
//     $file = fopen($newFileName, "w");

//     // Here we add the content to the file
//     fwrite($file, "Content of the file");

//     // You can add new content to the file
//     // fwrite($file, "\nNew content in a new line.");

//     $file = fopen($newFileName, "r");

//     // Print the content
//     $content = fread($file, filesize($newFileName));
//     echo nl2br($content);
//     // echo json_encode($content);

//     // Close the file buffer
//     fclose($file);
// }else{
//     echo "error";
// }

// ------------------------------------------------------------

// $create = $_POST['create'];

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