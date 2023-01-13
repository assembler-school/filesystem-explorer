<?php
$directoryNewName = $_REQUEST["directoryNewName"];
$directoryOldName = $_REQUEST["directoryOldName"];
$resultado = rename("../files/".$directoryOldName, "../files/".$directoryNewName);

if ($resultado) {
    echo json_encode("Se ha modificado el directorio $directoryOldName");
} else {
    echo json_encode("Error modificando directorio");
}