<?php
session_start();
require_once("dbh.inc.php");

$directory = $_SESSION["directory"];



$fetchQuery = $db -> prepare("
SELECT * FROM `files` WHERE daddyPath=:path
");

$fetchQuery -> execute([
  "path"=>$directory
]);

$fileFetched = $fetchQuery -> rowCount()? $fetchQuery : [] ;
?>