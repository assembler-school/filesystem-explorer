<?php
$nombreActual = $_GET["actualFolderName"];
$nombreModificado = $_GET["nameFolder"];

rename("../root/$nombreActual", "../root/$nombreModificado");

?>