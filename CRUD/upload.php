<?php


if (isset($_FILES['nombre']['error'])) { 

    $size = 40000; 
    $allows = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg", "txt"); 
    $load_route = $_FILES['nombre']['name'];

    $explodedFiles = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($explodedFiles));
    
    
    if (in_array($extension, $allows)) { 
        
        if ($_FILES['nombre']['size'] < ($size * 1024)) { 
            
            if (move_uploaded_file($_FILES['nombre']['tmp_name'], $_SESSION["absPath"] . '/' . $load_route)) {
                echo "The file was uploaded successfully";
                header('Location: index.php');
                } else {
                echo "Error loading file";
            }
        } else {
            echo "File exceeds the allowed size";
        }
    } else {
        echo "file not allowed";
    }
} 


    ?>
