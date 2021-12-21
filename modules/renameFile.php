<?php
echo "Hola";
$root = $_GET["root"];
$fileName = $_GET["fileName"];
$oldName = $root."/".$fileName;
$newName = $root."/renamed";
rename($oldName,$newName);