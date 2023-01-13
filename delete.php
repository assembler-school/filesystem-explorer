<?php

$actualFolder = $_REQUEST["actualFolderName"];

echo json_encode($actualFolder);

rmdir("$actualFolder");