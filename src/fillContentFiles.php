<?php
require_once('./src/fillContent.php');
require_once('./src/fileIcons.php');

$files = getFiles($_SESSION['currentPath']);
if ($files) {
  array_walk($files, function ($filePath) {
    $fileIcon = getFileIcon($filePath);
    $fileName = basename($filePath);
    $shortFileName = strlen($fileName) > 22 ? substr($fileName, 0, 18) . '...' : $fileName;
    $fileSize = human_filesize(filesize($filePath));
    echo "<div class='file d-flex flex-column justify-content-end m-2 p-1' title='$fileName'>
      <div class='file-top' title='$fileName'>
      <i class='d-flex justify-content-center fad fa-$fileIcon fa-5x' title='$fileName'></i>
      </div>
      <div class='file-bottom rounded' title='$fileName'>
        <p class='mx-1 my-0 d-flex justify-content-center' title='$fileName'>$shortFileName</p>
        <p class='mx-1 my-0 d-flex justify-content-end' title='$fileName'>$fileSize</p>
      </div>
    </div>";
  });
} else {
  echo "<img src='./assets/img/empty.png'> <h3>Nothing here...</h3>";
}
