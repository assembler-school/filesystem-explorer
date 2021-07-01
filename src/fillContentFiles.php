<!-- <div class="file d-flex flex-column justify-content-end mx-2 p-1" title="Long File name 123123 123123 123123 12312.txt">
        <div class="file-top">

        </div>
        <div class="file-bottom">
          <p class="m-0 text-wrap">Long File name 12...</p>
          <p class="m-0 text-wrap">132.0 kb</p>
        </div>

      </div> -->
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
      <div class='file-top'>
      <i class='d-flex justify-content-center fas fa-$fileIcon fa-5x'></i>
      </div>
      <div class='file-bottom'>
        <p class='mx-1 my-0 d-flex justify-content-center'>$shortFileName</p>
        <p class='mx-1 my-0 d-flex justify-content-end'>$fileSize</p>
      </div>
    </div>";
  });
} else {
  echo "<img src='./assets/img/emptyFolder.png'>";
}
