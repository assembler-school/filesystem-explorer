<?php
// Required files
require_once("./modules/fileStats.php");

// Root folder
$target_dir = $_SESSION["currentPath"];
// $directoryFiles = $_SESSION["directoryFiles"];

// List all files
foreach (scandir($target_dir) as $i) {
    $firstCharacter = substr($i, 0, 1);
    if ($i != "..") {
        // Not show hidden folders
        if ($firstCharacter != ".") {
            $target_file = $target_dir . "/" . basename($i);
            $fileArray = getFileStats($target_file, $i);

            // Creating the file block
            // echo "<a class='row file-item px-3 py-2 d-flex justify-content-center align-items-center' href=./modules/filePreview.php?filePath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . "&fileName=" . $fileArray["name"] . ">";
            echo "<div class= 'row file-item px-3 py-2 d-flex justify-content-center align-items-center'>";
            echo "<div class='row col col-6 p-0 icon-and-name d-flex justify-content-between align-items-center'>";
            echo "<p class='col col-2 file-text file-icon p-0 d-flex justify-content-center'>";
            echo "<i class='far fa-" . $fileArray["icon"] . "'></i>";
            echo "</p>";
            // Adding a link for directories
            if ($fileArray["type"] == "directory") {
                echo "<p class='col col-10 file-text file-name'>";
                echo "<a class='dir dir-link dir-child' href=./modules/updatingPath.php?updatedPath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . ">";
                echo $fileArray["name"];
                echo "</a>";
                echo "</p>";
            } else {
                echo "<p class='col col-10 file-text file-name'>" . $fileArray["name"] . "</p>";
            }
            echo "</div>";
            // echo "<p class='col col-2 col file-text'>" . $fileArray["type"] . "</p>";
            // echo "<p class='file-text'>" . $fileArray["path"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["size"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["creation"] . "</p>";
            echo "<p class='col col-2 file-text'>" . $fileArray["modification"] . "</p>";
            echo "</div>";
        }
    }
};

/* -------------------------------------------------------------------------- */
/*                                    TEST                                    */
/* -------------------------------------------------------------------------- */
// echo "These are the directory files: <pre>" . print_r($directoryFiles, true) . "</pre>";
