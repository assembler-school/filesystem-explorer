<?php
require_once("./dbh.inc.php");
$id = $_GET["id"];
$path = $_GET["path"];

$deleteQuery = $db->prepare("
DELETE FROM `files` WHERE `id` = :id;
");

$deleteQuery->execute([
    "id" => $id
]);


unlink($path);
echo $path;
// header("location: ../index.php");
