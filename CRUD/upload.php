<?php

if (isset($_FILES['nombre']['error'])) { //Valida si no hay errores
    $dir = "root/"; //Directorio de carga
    $tamanio = 40000; //Tamaño permitido en kb
    $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg"); //Archivos permitidos
    $ruta_carga = $dir . $_FILES['nombre']['name'];
    //Obtenemos la extensión del archivo
    $arregloArchivo = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        
        if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { //Valida el tamaño
            
            //Valida si no existe la carpeta y la crea
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

    $listar = null;
    $directorio = opendir('root/');
    while($elemento = readdir($directorio)){
        if($elemento != '.' && $elemento != '..'){
        if(is_dir('root/' . $elemento)){
            $listar .= "<div class='col-md-4'>
                            <a href='root/$elemento'>$elemento/</a>
                        </div>";
        }else{
            $listar .= "<div class='col-md-4'>
                            <a href='root/$elemento'>$elemento</a>
                        </div>";
        }
    }
}




?>