<?php

echo __DIR__ . '<br>';
echo __FILE__ . '<br>';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>







<?php
// if (isset($_FILES["file"])) {

//     $phpFileUploadErrors = array(
//         0 => "There is no error, the file uploaded with success",
//         1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
//         2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
//         3 => "The uploaded file was only partially uploaded",
//         4 => "No file was uploaded",
//         6 => "Missing a temporary folder",
//         7 => "Failed to write file to disk",
//         8 => "A PHP extension stopped the file upload",
//     );

//     $extensions = array("jpg", "jpeg", "png", "JPG", "JPEG", "PNG", "gif", "svg", "txt", "xsl", "xslx", "mp3", "MP3", "flac", "aac", "wav", "aiff", "pdf", "mpeg", "mp4", "mov", "wmv", "avi", "avchd", "flv", "ppt", "pptx", "doc", "docx", "zip", "rar", "php", "html", "css", "sass", "scss", "ini", "json");
//     $fileExt = explode(".", $_FILES["file"]["name"]);
//     $fileExt = end($fileExt);
//     $validFileName = chop($_FILES["file"]["name"], "." . $fileExt);
//     $invalidCharacters = array(".", " ", "/", ",");
//     $validFileName = str_replace($invalidCharacters, "_", $validFileName);
//     $validFileName = $validFileName . "." . $fileExt;


//     if ($_FILES["file"]["error"]) {
//         $_SESSION["errorMsg"] = $phpFileUploadErrors[$_FILES["file"]["error"]];
//     } elseif (!in_array($fileExt, $extensions)) {
//         $_SESSION["invalidMsg"] = $_FILES["file"]["name"] . " has invalid file extension!";
//     } elseif (is_file("./root" . $_SESSION["currentPath"] . "/" . $validFileName)) {
//         $_SESSION["errorMsg"] = "File with that name already exists!";
//     } else {
//         if (isset($_SESSION["currentPath"])) {
//             move_uploaded_file($_FILES["file"]["tmp_name"], "./root" . $_SESSION["currentPath"] . "/" . $validFileName);
//         } else {
//             move_uploaded_file($_FILES["file"]["tmp_name"], "./root" . "/" . $validFileName);
//         }
//         $_SESSION["successMsg"] =  $_FILES["file"]["name"] . " has been uploaded";
//     }
// }
?>

