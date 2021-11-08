<?php
session_start();
require_once('dbh.inc.php');

if (isset($_POST["addfolder"])) {
  
  if (isset($_GET["directory"]) && $_GET["directory"] !== "" && $_GET["directory"] !== "root") {
    $mkdirRoute = "../" . $_GET["directory"];
    //"../root/a/b/c"
  } else {
    $mkdirRoute = "../root";
  }
  mkdir($mkdirRoute ."/". $_POST["addfolder"], 0777, true);
}

echo "<br/>";
echo $mkdirRoute . $_POST["addfolder"];
echo "<br/>";
echo $mkdirRoute;
echo "<br/>";
if ($_GET["directory"]) {
  echo $_GET["directory"];
  echo "<br/>";
}

$modified = date("Y-m-d", filemtime($mkdirRoute . $_POST["addfolder"]));
$creation = date("Y-m-d", filectime($mkdirRoute . $_POST["addfolder"]));
$fileName = $_POST["addfolder"];


// prepare to upload to db 

$uploadQuery =$db->prepare("
BEGIN;
INSERT INTO `files`(`name`, `size`, `modified`, `creation`, `extension`, `path`, `daddyPath`) 
  VALUES (:name, :size, :modified, :creation, :extension, :path, :daddyPath);
INSERT INTO `folder`(`folderName`, `path`) 
  VALUES (:name,:path);
COMMIT;
");

//encryptfunction 

$uploadQuery->execute([
  "name"=>$fileName,
  "size"=>0,
  "modified"=>$modified,
  "creation"=>$creation,
  "extension"=>"folder",
  "path"=>$mkdirRoute . $_POST["addfolder"],
  "daddyPath"=>$mkdirRoute . $_POST["addfolder"]
]);

$_SESSION["directory"]= $mkdirRoute;


// if(!file_exists("../root/$fileName")) {
// mkdir($pathName . $fileName, 0777, true);
// if (PHP_OS !== "WINNT") {
//   chmod($pathName . $fileName, 0777);
// }
// }

header("location: ../index.php");