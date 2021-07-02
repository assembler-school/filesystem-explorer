<?php
// Required files
require_once("./modules/fileStats.php");

$matchedFiles = $_SESSION["matchedFiles"];

// Search / Directory preview
if ($_SESSION["isSearching"]) {
    // Iterating through all found files
    foreach ($matchedFiles as $matchedFile) {
        $fileArray = getFileStats($matchedFile["path"], $matchedFile["name"]);
        createFileRow($fileArray, dirname($matchedFile["path"]));
    }
} else {
    $target_dir = $_SESSION["currentPath"];
    // Iterating through all files in folder
    foreach (scandir($target_dir) as $i) {
        // Don't show hidden folders
        $firstCharacter = substr($i, 0, 1);
        if ($i != "..") {
            if ($firstCharacter != ".") {
                $target_file = $target_dir . "/" . basename($i);
                $fileArray = getFileStats($target_file, $i);
                createFileRow($fileArray, $_SESSION["currentPath"]);
            }
        }
    }
}

// Generic function to create file's row
function createFileRow($fileArray, $filePath)
{
    echo "<div class='dir dir-link dir-child row file-item px-3 py-2 d-flex justify-content-center align-items-center'>";

    // Creating the file block

    // Link to new path if it is a folder
    if ($fileArray["type"] == "directory") {
        echo "<a class='row col col-11' href=./modules/updatingPath.php?updatedPath=" . $filePath . "/" . $fileArray["name"] . ">";
    }

    // Link to preview if it is a file
    else {
        echo "<a class='row col col-11' href=./index.php?filePath=" . $filePath . "/" . $fileArray["name"] . "&fileName=" . $fileArray["name"] . ">";
    }

    echo "<div class='row col col-5 p-0 icon-and-name d-flex justify-content-between align-items-center'>";
    echo "<p class='col col-2 file-text file-icon p-0 d-flex justify-content-center'>";
    echo "<i class='far fa-" . $fileArray["icon"] . "'/></i>";
    echo "</p>";
    echo "<p class='col col-10 file-text file-name'>";
    echo $fileArray["name"];
    echo "</p>";
    echo "</div>";
    echo "<p class='col col-2 file-text'>" . $fileArray["size"] . "</p>";
    echo "<p class='col col-2 file-text'>" . $fileArray["creation"] . "</p>";
    echo "<p class='col col-2 file-text'>" . $fileArray["modification"] . "</p>";
    echo "</a>";

    // Edit button link
    echo "<div class='row col col-1 file-buttons file-text p-0'>";
    echo "<button id='oldNameButton' data-old='" . $fileArray["name"] . "' data-path='" . $fileArray["path"] . "' class='col col-6 btn button-file' type='button' class='btn col col-6 edit-file' data-bs-toggle='modal' data-bs-target='#editFileModal'>";
    echo "<i class='far fa-edit'></i>";
    echo "</button>";

    // Delete button link
    echo "<a class='col col-6 btn button-file delete-file' href=./modules/deleteFiles.php?filePath=" . $fileArray["path"] . "&fileType=" . $fileArray["type"] . ">";
    echo "<i class='far fa-trash-alt'></i>";
    echo "</a>";
    echo "</div>";

    echo "</div>";
}
