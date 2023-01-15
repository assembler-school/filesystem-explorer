<?php

if(isset($_SESSION) && isset($_REQUEST["route"])) {
    $completeRoot = $_REQUEST["route"] . "/";
    
}

if (isset($_FILES['nombre']['error'])) { //Valida si no hay errores
    $dir = $completeRoot; //Directorio de carga
    $tamanio = 40000; //Tamaño permitido en kb
    $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg"); //Archivos permitidos
    $ruta_carga = $completeRoot . $_FILES['nombre']['name'];
    //Obtenemos la extensión del archivo
    $arregloArchivo = explode(".", $_FILES['nombre']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        
        if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { //Valida el tamaño
            
            //Valida si no existe la carpeta y la crea
            if (!file_exists($completeRoot)) {
                mkdir($completeRoot, 0777, true);
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


echo realpath("12345123");  





// if (isset($_FILES['nombre']['error'])) { 
//     $dir = "root/"; 
//     $tamanio = 40000; 
//     $permitidos = array("jpg" => 'assets/icons/dark/jpg-dark.png', "pdf"=> 'assets/icons/dark/png-dark.png', "csv"=> 'assets/icons/dark/csv-dark.png', "doc"=> 'assets/icons/dark/doc-dark.png', "exe"=> 'assets/icons/dark/exe-dark.png', "mp3"=> 'assets/icons/dark/mp3-dark.png', "mp4"=> 'assets/icons/dark/mp4-dark.png', "odt"=> 'assets/icons/dark/odt-dark.png', "png"=> 'assets/icons/dark/png-dark.png', "ppt"=> 'assets/icons/dark/ppt-dark.png', "rar"=> 'assets/icons/dark/rar-dark.png', "zip"=> 'assets/icons/dark/zip-dark.png', "svg"=> 'assets/icons/dark/svg-dark.png');
//     // $permitidos = array("jpg", "pdf", "csv", "doc", "exe", "mp3", "mp4", "odt", "png", "ppt", "rar", "zip", "svg");  
//     $ruta_carga = $dir . $_FILES['nombre']['name'];
//     $arregloArchivo = explode(".", $_FILES['nombre']['name']);
//     $extension = strtolower(end($arregloArchivo));
    
// // foreach($permitidos as $item => $value){
// //     echo "<img src='$value'>";
// // }

    
//     if (in_array($extension, $permitidos)) { 
        
//         if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { 
            
//             if (!file_exists($dir)) {
//                 mkdir($dir, 0777,true);
//             }
            
//             if (move_uploaded_file($_FILES['nombre']['tmp_name'], $ruta_carga)) {
//                 echo "El archivo se cargó correctamente";
//                 } else {
//                 echo "Error al cargar archivo";
//             }
//         } else {
//             echo "Archivo excede el tamaño permitido";
//         }
//     } else {
//         echo "Archivo no permitido";
//     }
// } 





// if (isset($_FILES['nombre']['error'])) { 
//     $dir = "root/"; 
//     $tamanio = 40000; 
//     $permitidos = array("jpg" => 'assets/icons/dark/jpg-dark.png', "pdf"=> 'assets/icons/dark/png-dark.png', "csv"=> 'assets/icons/dark/csv-dark.png', "doc"=> 'assets/icons/dark/doc-dark.png', "exe"=> 'assets/icons/dark/exe-dark.png', "mp3"=> 'assets/icons/dark/mp3-dark.png', "mp4"=> 'assets/icons/dark/mp4-dark.png', "odt"=> 'assets/icons/dark/odt-dark.png', "png"=> 'assets/icons/dark/png-dark.png', "ppt"=> 'assets/icons/dark/ppt-dark.png', "rar"=> 'assets/icons/dark/rar-dark.png', "zip"=> 'assets/icons/dark/zip-dark.png', "svg"=> 'assets/icons/dark/svg-dark.png'); 
//     $ruta_carga = $dir . $_FILES['nombre']['name'];
//     $arregloArchivo = explode(".", $_FILES['nombre']['name']);
//     $extension = strtolower(end($arregloArchivo));
    
//     if (in_array($extension, $permitidos)) { 
        
//         if ($_FILES['nombre']['size'] < ($tamanio * 1024)) { 
            
//             if (!file_exists($dir)) {
//                 mkdir($dir, 0777);
//             }
            
//             if (move_uploaded_file($_FILES['nombre']['tmp_name'], $ruta_carga)) {
//                 echo "El archivo se cargó correctamente";
//                 } else {
//                 echo "Error al cargar archivo";
//             }
//         } else {
//             echo "Archivo excede el tamaño permitido";
//         }
//     } else {
//         echo "Archivo no permitido";
//     }
// } 
?>