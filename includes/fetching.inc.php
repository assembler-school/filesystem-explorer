<?php
require_once("./includes/dbh.inc.php");

$fetchQuery = $db -> prepare("
SELECT * FROM `files`
");

$fetchQuery -> execute();

$fileFetched = $fetchQuery -> rowCount()? $fetchQuery : [] ;
?>