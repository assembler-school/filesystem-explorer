<?php


if (isset($_FILES['nombre']['error'])) { 

    $tamanio = 40000; 
    $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg", "txt"); 
    $ruta_carga = $_FILES['nombre']['name'];

    $arregloArchivo = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    
    if (in_array($extension, $permitidos)) { 
        
        if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { 
            
            if (move_uploaded_file($_FILES['nombre']['tmp_name'], $_SESSION["absPath"] . '/' . $ruta_carga)) {
                echo "El archivo se cargó correctamente";
                header('Location: index.php');
                } else {
                echo "Error al cargar archivo";
            }
        } else {
            echo "Archivo excede el tamaño permitido";
        }
    } else {
        echo "Archivo no permitido";
    }
} 


    ?>