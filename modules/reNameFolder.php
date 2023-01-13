<?php
$directoryName = $_REQUEST["directoryName"];
$resultado = rename("../files/".$directoryName, "hola");

if ($resultado) {
    echo json_encode("Se ha modificado el directorio $directoryName");
} else {
    echo json_encode("Error modificando directorio");
}