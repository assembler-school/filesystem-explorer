
<?php

// $directory = "index.php";

if (isset($_GET["directory"])) {
  $directory = '../' . $_GET["directory"];
}

$target_dir = $_GET["directory"] ? $directory : "../root/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {

  $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    echo "There is a file - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "There is no file";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if (
  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "mp4" && $imageFileType != "mp3"
  && $imageFileType != "doc" && $imageFileType != "csv" && $imageFileType != "ppt" && $imageFileType != "odt" 
  && $imageFileType != "zip" && $imageFileType != "rar" && $imageFileType != "exe" && $imageFileType != "svg"
) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "/" . $_FILES["fileToUpload"]["name"])) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
    $path = explode("/", $directory);

    array_shift($path);
    $path = implode("/", $path);

header("Location:  ../index.php?directory=$path");
