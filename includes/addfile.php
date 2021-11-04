<?php
require_once("./dbh.inc.php");
echo "<a href='javascript:history.back(1);'>Back</a>'";
echo "<pre>";
print_r($_FILES);

$pathName= "../root";
$fileName = $_FILES["addfile"]["name"];
$fileType =$_FILES["addfile"]["type"];
$fileTmp = $_FILES["addfile"]["tmp_name"];
$fileSize = $_FILES["addfile"]["size"];

if(!file_exists("../root")) {
mkdir($pathName, 0777, true);
chmod($pathName, 0777);

if(file_exists("../root")) {

  if(move_uploaded_file($fileTmp, "../root/" . $fileName)) {
    echo "Uploaded file";
  }else {
    echo "File upload failed";
  }
}
}

$file= $_FILES["addfile"];
$name = $file["name"];
$extension = $file["type"];
$size = $file["size"];
$ext = pathinfo($name, PATHINFO_EXTENSION);
$modified = date("Y-m-d", filemtime($target_file));
$creation = date("Y-m-d", filectime($target_file));
// prepare to upload to db 

$uploadQuery =$db-> prepare("
INSERT INTO `files`(`id`, `name`, `size`, `modified`, `creation`, `extension`) VALUES (':name',':size',':modified',':creation',':extension')
");

//encrypt

$uploadQuery->execute([
  "name"=>$name,
  "size"=>$size,
  "modified"=>$modified,
  "creation"=>$creation,
  "extension"=>$ext,
  "path"=>$pathName . $fileName
]);