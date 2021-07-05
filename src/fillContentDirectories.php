<?php
require_once('./src/fillContent.php');

$folders = getDirectories($_SESSION['currentPath']);

array_walk($folders, function ($path) {
  $folderName = basename($path);
  $shortFolderName = strlen($folderName) > 16 ? substr($folderName, 0, 13) . '...' : $folderName;
  $filesCount = count(scandir($path)) - 2;
  echo "<a href='index.php?path=$path' class='m-0 folderLink text-decoration-none' title='$folderName'><div class='folder d-flex flex-column justify-content-end m-2 p-1' title='$folderName'>
    $shortFolderName
    <p class='m-0 text-decoration-none' title='$folderName'>Items: $filesCount</p>
  </div></a>";
});
