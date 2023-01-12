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

// function createElements() {
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


// --------------------------------------------------
    // try {
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
    //     echo json_encode($content);
        
    
    //     // Close the file buffer
    //     fclose($file);
    // } catch (Throwable $t) {
    //     echo $t->getMessage();
    // }
    
    
// }

?>