<?php
require_once("./dbh.inc.php");
$id = $_GET["id"];
$name = $_GET["name"];
$path = "../root/" . $name;

$deleteQuery = $db-> prepare("
BEGIN;
DELETE FROM `files` WHERE `id` = :id;
DELETE FROM `folder` WHERE `folderName` = :name
COMMIT;
");

$deleteQuery->execute([
"id"=> $id,
"name"=>$name
]);


unlink($path);
//header("location: ../index.php");