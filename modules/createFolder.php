<?php
require_once('./getFilesAndFolders.php');

$newDir = mkdir("../root/newFolder", 0700, true);

echo json_encode(["ok"=>true]);