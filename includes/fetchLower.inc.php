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

$fileFetched = $fetchQuery -> rowCount()? $fetchQuery : [] ;
$_SESSION["lower"] = $fileFetched;
header("Location: ../lower.php?directory=$pathLower");
?>