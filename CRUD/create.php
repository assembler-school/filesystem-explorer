<?php
session_start();


  if (empty($_POST['name-folder']) === false) {

    if (file_exists($_POST['name-folder']) === true) {
      echo json_encode('El archivo o directorio ya existe');
    } else {
      if (@mkdir("./root/" . $_POST['name-folder'], 0777) === false) {
        echo "error";
      }
    }

    if (!file_exists($_POST['name-folder']) === true) {
      @mkdir($_SESSION["absPath"] . "/" . $_POST['name-folder'] , 0777);
    } 
    // else {
    //   if (file_exists("./root/" . $_POST['name-folder'])) {
    //     @mkdir($_SESSION["absPath"] . "/" . $_POST['name-folder'] , 0777);
    //     }
    // }
  }





  // if (file_exists("./root/" . $_POST['name-folder'])) {
  //   @mkdir($_SESSION["absPath"] . "/" . $_POST['name-folder'] , 0777);
  //   }




// -----------------------------------------------------------------

// if (empty($_POST['name-folder']) === false) {
//     /* Si existe un archivo o directorio con ese nombre no lo sobreescribiremos */
//     if (file_exists($_POST['name-folder']) === true) {
//       echo json_encode('El archivo o directorio ya existe');
//     } else {
//       if (@mkdir("root/" . $_POST['name-folder'], 0777) === false) {
//         echo json_encode('No se pudo crear el directorio');
//       }
//     }
  
// }





// --------------------------------------------------------------------------
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