<?php
require_once("./dbh.inc.php");

$deleteQuery = $db-> prepare("
DELETE FROM `files` WHERE `id` = :id
");

$deleteQuery->execute([
"id"=> $_GET["id"]
]);

header("location: ../index.php");