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

$files = getFiles($_SESSION['currentPath']);

array_walk($files, function($filePath) {
    $fileName = basename($filePath);
    $shortFileName = strlen($fileName)>16 ? substr($fileName, 0, 13) . '...' : $fileName;
    $fileSize = human_filesize(filesize($filePath));
    echo "<div class='file d-flex flex-column justify-content-end mx-2 p-1' title='$fileName'>
    <div class='file-top'>

    </div>
    <div class='file-bottom'>
      <p class='m-0 text-wrap'>$shortFileName</p>
      <p class='m-0 text-wrap'>$fileSize</p>
    </div>

  </div>";
});