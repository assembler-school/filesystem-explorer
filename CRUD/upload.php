<?php

if(isset($_SESSION) && isset($_REQUEST["route"])) {
    $completeRoot = $_REQUEST["route"] . "/";
}


if (isset($_FILES['nombre']['error'])) { //Valida si no hay errores
    $tamanio = 40000; //Tamaño permitido en kb
    $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg"); //Archivos permitidos
    $nameuploadFile =  $_FILES['nombre']['name'];
    //Obtenemos la extensión del archivo
    $arregloArchivo = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        
        if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { //Valida el tamaño
            
            if (move_uploaded_file($_FILES['nombre']['tmp_name'], $_SESSION["absPath"] . "/" . $nameuploadFile)) {
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





