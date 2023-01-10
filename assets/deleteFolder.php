<?php
$nombreActual = $_GET["actualFolderName"];

rmdir("../root/$nombreActual");

?>