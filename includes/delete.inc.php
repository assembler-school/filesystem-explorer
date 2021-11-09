<?php
require_once("./dbh.inc.php");
$id = $_GET["id"];
$name = $_GET["name"];
$path = "../root/" . $name;

$deleteQuery = $db->prepare("
DELETE FROM `files` WHERE `id` = :id;
");

$deleteQuery->execute([
    "id" => $id,
    "name" => $name
]);


unlink($path);
//header("location: ../index.php");