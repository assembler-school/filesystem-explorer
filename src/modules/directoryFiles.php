<?php
// Required files
require_once("./modules/fileStats.php");
// require_once("../modules/deleteFiles.php");


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
                echo "<a class='dir dir-link dir-child row file-item px-3 py-2 d-flex justify-content-center align-items-center' href=./modules/updatingPath.php?updatedPath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . ">";
            } else {
                echo "<a class='dir dir-link dir-child row file-item px-3 py-2 d-flex justify-content-center align-items-center' href=./index.php?filePath=" . $_SESSION["currentPath"] . "/" . $fileArray["name"] . "&fileName=" . $fileArray["name"] . ">";
            }
            // echo "<a class='row file-item px-3 py-2 d-flex justify-content-center align-items-center'>";
            echo "<div class='row col col-4 p-0 icon-and-name d-flex justify-content-between align-items-center'>";
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
            // Delete button link
            echo "<div class='row col col-2 file-buttons file-text'>";

            echo "<form class='col col-6' method='POST' action='./modules/editFiles.php?donwload=" . $fileArray["name"] . "'>";
            echo "<input class='button-file' name='fileName' value='" . $fileArray["name"] . "'/>";
            echo "<input class='button-file' name='fileType' value='" . $fileArray["name"] . "'/>";
            echo "<button type='submit' class='btn col col-6'>";
            echo "<i class='fas fa-file-download'></i>";
            echo "</button>";
            echo "</form>";


            echo "<form class='col col-6' method='POST' action='./modules/deleteFiles.php'>";
            echo "<input class='button-file' name='fileName' value='" . $fileArray["name"] . "'/>";
            echo "<input class='button-file' name='fileType' value='" . $fileArray["type"] . "'/>";
            echo "<button type='submit' class='btn col col-6'>";
            echo "<i class='far fa-trash-alt'></i>";
            echo "</button>";
            echo "</form>";


            echo "</div>";
            echo "</a>";
        }
    }
};




// Download



/* -------------------------------------------------------------------------- */
/*                                    TEST                                    */
/* -------------------------------------------------------------------------- */
// echo "These are the directory files: <pre>" . print_r($directoryFiles, true) . "</pre>";