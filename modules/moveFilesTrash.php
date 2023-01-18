<?php
$dataPath = $_REQUEST["dataPath"];
$dataArray = explode("/", $dataPath);
$dataEnd = strtolower(end($dataArray));
$resultado = rename("../files/".$dataPath, "../trash/".$dataEnd);

if ($resultado) {
    echo json_encode("Se ha movido al directorio trash");
} else {
    echo json_encode("Error moviendo directorio");  
}