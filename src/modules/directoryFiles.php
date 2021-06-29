<?php
// Required files
require_once("./modules/fileStats.php");


// Root folder
$target_dir = $_SESSION["currentPath"];

// List all files
foreach (scandir($target_dir) as $i) {
    $firstCharacter = substr($i, 0, 1);
    if ($i != "..") {
        // Not show hidden folders
        if ($firstCharacter != ".") {
            $target_file = $target_dir . "/" . basename($i);
            $fileArray = getFileStats($target_file, $i);

            // Creating the file block
            if ($fileArray["type"] == "directory") {
                echo "<div class='dir dir-link dir-child row file-item px-3 py-2 d-flex justify-content-center align-items-center'>";
                echo "<a class='row col col-11' href=./modules/updatingPath.php?updatedPath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . ">";
            } else {
                echo "<div class='dir dir-link dir-child row file-item px-3 py-2 d-flex justify-content-center align-items-center'>";
                echo "<a class='row col col-11' href=./index.php?filePath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . "&fileName=" . $fileArray["name"] . ">";
            }

            echo "<div class='row col col-5 p-0 icon-and-name d-flex justify-content-between align-items-center'>";
            echo "<p class='col col-2 file-text file-icon p-0 d-flex justify-content-center'>";
            echo "<i class='far fa-" . $fileArray["icon"] . "'></i>";
            echo "</p>";
            echo "<p class='col col-10 file-text file-name'>";
            echo $fileArray["name"];
            echo "</p>";
            echo "</div>";
            // echo "<p class='col col-2 col file-text'>" . $fileArray["type"] . "</p>";
            // echo "<p class='file-text'>" . $fileArray["path"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["size"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["creation"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["modification"] . "</p>";

            echo "</a>";

            // Delete button link
            echo "<div class='row col col-1 file-buttons file-text p-0'>";

            echo "<button id='oldName' data-old='" . $fileArray["name"] . "' class='col col-6 btn button-file' type='button' class='btn col col-6' data-bs-toggle='modal' data-bs-target='#editFileModal'>";
            echo "<i class='far fa-edit'></i>";
            echo "</button>";

            echo "<a class='col col-6 btn button-file' href=./modules/deleteFiles.php?fileName=" . $fileArray["name"] . "&fileType=" . $fileArray["type"] . "'/>";
            echo "<i class='far fa-trash-alt'></i>";
            echo "</a>";

            echo "</div>";
            echo "</div>";
        }
    }
};
