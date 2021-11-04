<?php

require_once("./dbh.inc.php");
$id = $_GET["id"];


$editQuery = $db -> prepare("
UPDATE `files` SET `edit`= :edit WHERE `id`= :id
");

$editQuery->execute([
"edit"=> 1,
"id"=> $id

]);

  header("location: ../index.php");
?>