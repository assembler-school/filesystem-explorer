<?php

$oldname = $_POST["oldName"];
$newname = $_POST["newname"];

$ruta=explode("/", $oldname);

array_pop($ruta);

$rutacompleta = "";

foreach ($ruta as $valor){
    $rutacompleta .= $valor."/";
}

$newname = $rutacompleta . $newname;

// echo newname;

$data = [$oldname, $newname];

rename($oldname, $newname);

echo json_encode($data);

?>