<?php

if (isset($_FILES['nombre']['error'])) { 
    $dir = "root/"; 
    $tamanio = 40000; 
    $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg"); //Archivos permitidos
    $ruta_carga = $dir . $_FILES['nombre']['name'];
    $arregloArchivo = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    if (in_array($extension, $permitidos)) { 
        
        if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { 
            
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            
            if (move_uploaded_file($_FILES['nombre']['tmp_name'], $ruta_carga)) {
                echo "El archivo se cargó correctamente";
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