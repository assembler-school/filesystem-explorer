<?php
$directoryName = $_REQUEST["directoryName"];

$resultado = mkdir(__DIR__ . "/$nombre_directorio");

if ($resultado) {
    echo "Se ha creado el directorio $nombre_directorio";
} else {
    echo "Error creando directorio";
}