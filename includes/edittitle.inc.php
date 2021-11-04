<?php

  require_once("./dbh.inc.php");

  $oldName = $_GET["name"];
  $newName = $_POST["title"];
  $path = $_GET["path"];
  $id = $_GET["id"];

  $edittitleQuery = $db -> prepare("
  UPDATE `files` SET `name`=:name,`path`=:path, `edit`=:edit WHERE `id`=:id
  ");

  $edittitleQuery ->execute([
    "name"=> $newName,
    "id"=> $id,
    "edit"=> 0,
    "path"=> $path
  ]);

  header("location: ../index.php");

?>