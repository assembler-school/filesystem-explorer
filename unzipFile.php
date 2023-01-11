<?php

session_start();
define("ROOT", "./root");

$fileName = $_REQUEST['file'];
$relativePath = $_SESSION['relativePath'];
$absolutePath = $_SESSION['absolutePath'];
echo $absolutePath;
$filetmp = (explode('.', $fileName));
$fileExtension = strtolower(end($filetmp));

if (isset($_SESSION['relativePath'])) {
  $returnPath = $_SESSION['relativePath'];
}

if ($fileExtension == 'rar') {
  $archive = RarArchive::open($absolutePath . '/' . $fileName);
  $entries = $archive->getEntries();
  foreach ($entries as $entry) {
    $entry->extract($_SESSION['absolutePath']);
  }
  $archive->close();
} else {
$zip = new ZipArchive;
if ($zip->open($absolutePath . '/' . $fileName) === TRUE) {
    $zip->extractTo($absolutePath);
    $zip->close();
} else {
    echo 'failed to unzip file';
}
}

header("Location: index.php?p=$returnPath");
