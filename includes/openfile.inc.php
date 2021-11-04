<?php
include_once "./utils.php";

$path = $_GET["path"];
echo  $path;
$extension = $_GET["extension"];
echo "<br>";
echo $extension;

switch ($extension) {
  case 'txt':
  case 'pdf':
    read_txt($path);
    break;
  case 'docx':
  case 'doc':
    read_docx($path);
    break;
  case 'jpg':
  case 'png':
  case 'gif':
  case 'jpeg':
  case 'webp':
  case 'svg':
    echo "<img src='$path' alt='$path' />";
    break;
  // case 'zip':
  // case 'rar':
  // case '7z':
  //   gzread($path, filesize($path));
  //   break;
  case 'mp3':
    echo "<audio controls>
      <source src='$path' type='audio/mp3'>
    </audio>";
    break;
  case 'mp4':
    echo "<video controls>
      <source src='$path' type='video/mp4'>
    </video>";
    break;
  default:
    echo "File type not supported";
    break;
}

?>