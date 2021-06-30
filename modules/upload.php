<?php
if (isset($_FILES["file"])) {

    $phpFileUploadErrors = array(
        0 => "There is no error, the file uploaded with success",
        1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        3 => "The uploaded file was only partially uploaded",
        4 => "No file was uploaded",
        6 => "Missing a temporary folder",
        7 => "Failed to write file to disk",
        8 => "A PHP extension stopped the file upload",
    );

    $extensions = array("jpg", "jpeg", "png", "gif", "svg", "txt", "xsl", "xslx", "mp3", "flac", "aac", "wav", "aiff", "pdf", "mpeg", "mp4", "mov", "wmv", "avi", "avchd", "flv", "ppt", "pptx", "doc", "docx", "zip", "rar", "php", "html", "css", "sass", "scss", "ini", "json");
    $file_ext = explode(".", $_FILES["file"]["name"]);
    $file_ext = end($file_ext);
    $valid_filename = chop($_FILES["file"]["name"], "." . $file_ext);
    $invalid_characters = array(".", " ", "/", ",");
    $valid_filename = str_replace($invalid_characters, "_", $valid_filename);
    $valid_filename = $valid_filename . "." . $file_ext;


    if ($_FILES["file"]["error"]) {
        $_SESSION["errorMsg"] = $phpFileUploadErrors[$_FILES["file"]["error"]];
    } elseif (!in_array($file_ext, $extensions)) {
        $_SESSION["invalidMsg"] = $_FILES["file"]["name"] . " has invalid file extension!";
    } elseif (is_file("./root" . $_SESSION["currentPath"] . "/" . $valid_filename)) {
        $_SESSION["errorMsg"] = "File with that name already exists!";
    } else {
        if (isset($_SESSION["currentPath"])) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "./root" . $_SESSION["currentPath"] . "/" . $valid_filename);
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], "./root" . "/" . $valid_filename);
        }
        $_SESSION["successMsg"] =  $_FILES["file"]["name"] . " has been uploaded";
    }
}
