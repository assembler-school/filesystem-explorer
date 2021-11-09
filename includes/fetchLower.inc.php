<?php
session_start();

require_once("dbh.inc.php");
$pathLower = $_GET["pathLower"];


$fetchQuery = $db -> prepare("
SELECT * FROM `files` WHERE daddyPath=:path
");

$fetchQuery -> execute([
  "path"=>$pathLower
]);

$fileFetched = $fetchQuery -> rowCount()? $fetchQuery : [];

echo $pathLower."<br/>";
print_r($fileFetched);
//header("Location: ../lower.php?directory=$pathLower");
