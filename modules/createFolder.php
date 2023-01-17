<?php
$directoryName = $_REQUEST["directoryName"];
$old_umask = umask(0);
$resultado = mkdir("../files/".$directoryName, 0777);

if ($resultado) {
    echo json_encode("Se ha creado el directorio $directoryName");
} else {
    echo json_encode("Error creando directorio");
}