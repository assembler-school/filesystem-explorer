<?php
// session_start();

// Required files
require_once("./modules/fileStats.php");

if (isset($_GET["fileName"])) {
    $fileName = $_GET["fileName"];
    $filePath = $_GET["filePath"];
    $fileArray = getFileStats($filePath, $fileName);

    echo "<div class='px-3 py-4 d-flex flex-column preview-wrapper'>";

    // Big icon / preview
    echo "<div class='d-flex flex-column align-items-center icon-wrapper px-0'>";
    echo "<i class='mb-4 preview-icon far fa-" . $fileArray["icon"] . "'></i>";
    echo "<span class='badge badge-dark'>";
    echo "<a href=" . $fileArray["path"] . " class='col col-md-8 text-center preview-link' target='_blank'>Preview</a>";
    echo "</span>";

    echo "</div>";

    // Main info
    echo "<div class='row px-3 preview-info'>";
    echo "<hr>";
    echo "<p class='col col-12 col-lg-4 preview-title'>Name</p>";
    echo "<p class='col col-12 col-lg-8 preview-text'>" . $fileArray["name"] . "</p>";
    echo "</div>";

    echo "<div class='row px-3 preview-info'>";
    echo "<hr>";
    echo "<p class='col col-12 col-lg-4 preview-title'>Type</p>";
    echo "<p class='col col-12 col-lg-8 preview-text'>" . $fileArray["type"] . "</p>";
    // echo "<p class='col col-lg-8 preview-text'>" . $fileArray["rawType"] . "</p>";
    echo "</div>";

    echo "<div class='row px-3 preview-info'>";
    echo "<hr>";
    echo "<p class='col col-12 col-lg-4 preview-title'>Size</p>";
    echo "<p class='col col-12 col-lg-8 preview-text'>" . $fileArray["size"] . "</p>";
    echo "</div>";

    echo "<div class='row px-3 preview-info'>";
    echo "<hr>";
    echo "<p class='col col-12 col-lg-4 preview-title'>Creation</p>";
    echo "<p class='col col-12 col-lg-8 preview-text'>" . $fileArray["creation"] . "</p>";
    echo "</div>";

    echo "<div class='row px-3 preview-info'>";
    echo "<hr>";
    echo "<p class='col col-12 col-lg-4 preview-title'>Modification</p>";
    echo "<p class='col col-12 col-lg-8 preview-text'>" . $fileArray["modification"] . "</p>";
    echo "</div>";
    echo "</div>";
}


/* -------------------------------------------------------------------------- */
/*                                    TEST                                    */
/* -------------------------------------------------------------------------- */
// echo "<p>" . print_r($fileArray, true) . "</p>";