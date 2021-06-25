<?php
$directory = '\xampp\htdocs\filesystem-explorer\src\dir';
$iterator = new RecursiveIteratorIterator(new DirectoryIterator($directory));
echo "<ul>";
foreach ($iterator as $fileinfo) {
  if (!$fileinfo->isDot()) {
    echo '<li>' . $fileinfo->getFilename() . '</li>';
  }
}
