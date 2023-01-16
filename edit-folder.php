<?php

$oldname = $_POST["oldName"];
$newname = $_POST["newname"];

$data = [$oldname, $newname];

rename($oldname, $newname);

echo json_encode($data);

?>