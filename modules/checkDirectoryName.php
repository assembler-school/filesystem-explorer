<?php
$directoryName = $_REQUEST["directoryName"];

if(is_dir("../files/".$directoryName)){
    
}

$resultado = mkdir("../files/".$directoryName);

if ($resultado) {
    echo json_encode("Se ha creado el directorio $directoryName");
} else {
    echo json_encode("Error creando directorio");
}