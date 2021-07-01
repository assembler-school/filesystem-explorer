<!-- <div class="folder d-flex flex-column justify-content-end mx-2 p-1" title="Long Folder name 123123 123123 123123 12312.txt">
        <p class="m-0">Long Folder name 12...</p>
        <p class="m-0">Items: 0</p>
      </div> -->

<?php
require_once('./src/fillContent.php');

$folders = getDirectories($_SESSION['currentPath']);



array_walk($folders, function ($path) {
  $folderName = basename($path);
  $shortFolderName = strlen($folderName) > 16 ? substr($folderName, 0, 13) . '...' : $folderName;
  $filesCount = count(scandir($path)) - 2;
  echo "<div class='folder d-flex flex-column justify-content-end m-2 p-1' title='$folderName'>
    <a href='index.php?path=$path' class='m-0' title='$folderName'>$shortFolderName</a>
    <p class='m-0' title='$folderName'>Items: $filesCount</p>
  </div>";
});
