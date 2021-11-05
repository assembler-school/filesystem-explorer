<?php

require_once('dbh.inc.php');


$modified = date("Y-m-d", filemtime($pathName . $fileName));
$creation = date("Y-m-d", filectime($pathName . $fileName));
$fileName = $_POST["addfolder"];
$pathName= "../root/";

// prepare to upload to db 

$uploadQuery =$db->prepare("
INSERT INTO `files`(`name`, `size`, `modified`, `creation`, `extension`, `path`) 
VALUES (:name, :size, :modified, :creation, :extension, :path)
");


//encrypt

$uploadQuery->execute([
  "name"=>$fileName,
  "size"=>0,
  "modified"=>$modified,
  "creation"=>$creation,
  "extension"=>"folder",
  "path"=>$pathName . $fileName
]);

if(!file_exists("../root/$fileName")) {
mkdir($pathName . $fileName, 0777, true);
if (PHP_OS !== "WINNT") {
  chmod($pathName . $fileName, 0777);
}
}

header("location: ../index.php");