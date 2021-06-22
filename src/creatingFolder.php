<?php
  session_start();

  $newFolderName = $_POST["folderName"];
  $pathNewFolder = ("C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root");
  $pathNewFolder = $pathNewFolder ."/" . $newFolderName;
  mkdir($pathNewFolder, 0700);
