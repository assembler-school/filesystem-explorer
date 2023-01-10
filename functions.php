<?php

    $route = "root";
  function viewElements($route){

    if (is_dir($route)){
        $manager = opendir($route);
        echo "<ul>";

        
        while (($file = readdir($manager)) !== false)  {

            $complete_route = $route . "/" . $file;

            if ($file != "." && $file != "..") {
                
                if (is_dir($complete_route)) {
                    echo "<li class='folderElements'>" . $file . "</li>";
                    viewElements($complete_route);
                } else {
                    echo "<li class='folderElements'>" . $file . "</li>";
                }
            }
        }

        closedir($manager);
        echo "</ul>";
    } else {
        echo "Not a valid directory path<br/>";
    }
}

function createElements() {
    
    try {
        $newFileName = "root/7-create-write-file.txt";
        // $fileContent = 'This is the content of the "3-create-write-file.txt" file.';
    
        // Now the file is created, but it's empty.
        $file = fopen($newFileName, "w");
    
        // Here we add the content to the file
        fwrite($file, "Content of the file");
    
        // You can add new content to the file
        // fwrite($file, "\nNew content in a new line.");
    
        $file = fopen($newFileName, "r");
    
        // Print the content
        $content = fread($file, filesize($newFileName));
        echo nl2br($content);
        echo json_encode($content);
        
    
        // Close the file buffer
        fclose($file);
    } catch (Throwable $t) {
        echo $t->getMessage();
    }
    
    
}


$ruta = "root";
function uploadElements($ruta){

    if (is_dir($ruta)){
        // Abre un gestor de directorios para la ruta indicada
        $gestor = opendir($ruta);

        // Recorre todos los archivos del directorio
        while (($archivo = readdir($gestor)) !== false)  {
            // Solo buscamos archivos sin entrar en subdirectorios
            if (is_file($ruta."/".$archivo)) {
                echo "<a href='".$ruta."/".$archivo."'></a
                
                <img src='".$ruta."/".$archivo."' width='200px' alt='".$archivo."' title='".$archivo."'>";
            }            
        }

        // Cierra el gestor de directorios
        closedir($gestor);
    } else {
        echo "No es una ruta de directorio valida<br/>";
    }



    // ----------------------------------------------------------------------------------------
    // $file = $_FILES['file'];

    // print_r($file);

    // $patch = $_SERVER['DOCUMENT_ROOT'] . '/PHP-ASSEMBLER/EJERCICIOS/EJERCICIO4/root' . '/' . $file['file'];

    // echo '<ul> ';
    // foreach($roles as $rol){
    //     echo '<li>'.$rol.'</li>';
        
    // }
    // echo '</ul>';
    // echo '<img src="./root/'.$file['file'].'">';

// -----------------------------------------------------
    // $target_dir = "./files/";
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // // Check if image file is a actual image or fake image
    // if (isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     if ($check !== false) {
    //         echo "<p>File is an image - " . $check["mime"] . ".</p>";
    //         $uploadOk = 1;
    //         if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
    //             echo "<p>El fichero es válido y se subió con éxito.</p>";
    //         } else {
    //             echo "<p>¡Posible ataque de subida de ficheros!</p>";
    //         }
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
}


?>