<?php

// $route = "root";

//   function viewElements($route){
//     if (is_dir($route)){
//         $manager = opendir($route);
//         echo "<ul>";
        
//         while (($file = readdir($manager)) !== false)  {

//             $complete_route = $route . "/" . $file;

//             if ($file != "." && $file != "..") {
//                 if (is_dir($complete_route)) {
//                     echo "<li class='folderElements'>" . $file . "</li>";
//                     viewElements($complete_route);
//                 } else {
//                     echo "<li class='folderElements'>" . $file . "</li>";
//                 }
//             }
//         }

//         closedir($manager);
//         echo "</ul>";
//     } else {
//         echo "Not a valid directory path<br/>";
//     }
// }


// $ruta = "files";

// function uploadElements($ruta){
//     $file = $_FILES['nombre'];
//     $nombre_archivo = $_FILES['nombre']['name'];
//     $tipo_archivo = $_FILES['nombre']['type'];
//     $tamano_archivo = $_FILES['nombre']['size'];


//     echo '<pre>';
//     print_r($file);
//     echo '</pre>';

//     $patch = $_SERVER['DOCUMENT_ROOT'] . '/PHP-ASSEMBLER/EJERCICIOS/EJERCICIO4/filesystem-explorer/files/';

//     if (is_dir($ruta)){
//         // Abre un gestor de directorios para la ruta indicada
//         $gestor = opendir($ruta);
//         // Recorre todos los archivos del directorio
//         while (($archivo = readdir($gestor)) !== false)  {
//             // Solo buscamos archivos sin entrar en subdirectorios
//             if (is_file($ruta . "/" . $archivo)) {
//                 if($tipo_archivo == 'image/jpeg'){
//                     echo "<h2>". $archivo ."</h2><a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/jpg-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/pdf'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/pdf-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'text/csv'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/csv-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/msword'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/doc-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/x-msdownload'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/exe-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'audio/mpeg'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/mp3-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'video/mp4'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/mp4-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/octet-stream'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/odt-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'image/png'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/png-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/vnd.ms-powerpoint'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/ppt-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/octet-stream'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/rar-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'image/svg+xml'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/svg-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
//                 if($tipo_archivo === 'application/x-zip-compressed'){
//                     echo "<a href='" . $ruta . "/" . $archivo . "'>" .
//                                 "<img src='./assets/icons/dark/zip-dark.png' width='150px' alt='" . $archivo . "' title='" . $archivo . "'>" .
//                         "</a>";
//                 }
               
                
//             }            
//         }
        
//         move_uploaded_file($file['tmp_name'], $patch . $nombre_archivo );
        
//         // Cierra el gestor de directorios
//         closedir($gestor);
//     } else {
//         echo "No es una ruta de directorio valida<br/>";
//     }

// }

// $create = $_POST['create'];

// function createElements($route) {
//     if(!isset($_POST['create'])){
//         $newFileName = "root/7-create-write-file.txt";
//         // $fileContent = 'This is the content of the "3-create-write-file.txt" file.';
    
//         // Now the file is created, but it's empty.
//         $file = fopen($newFileName, "w");
    
//         // Here we add the content to the file
//         fwrite($file, "Content of the file");
    
//         // You can add new content to the file
//         // fwrite($file, "\nNew content in a new line.");
    
//         $file = fopen($newFileName, "r");
    
//         // Print the content
//         $content = fread($file, filesize($newFileName));
//         echo nl2br($content);
//         // echo json_encode($content);
    
//         // Close the file buffer
//         fclose($file);
//     }else{
//         echo "error";
//     }
// }

?>