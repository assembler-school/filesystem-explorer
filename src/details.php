<?php
session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = "../" . substr($completePath, strpos($completePath, "root"));

include_once 'fillContent.php';

if (isset($_GET['n'])) {
    $currentElement = $currentPath . "/" . $_GET['n'];

    echo "<p class='text-break'><strong>Name: </strong>";
    echo basename($currentElement);
    echo "</p>
        <p><strong>Creation date: </strong>";
    echo date("d F Y - H:i", filemtime($currentElement));
    echo "</p>
        <p><strong>Size: </strong>";
    echo human_filesize(filesize($currentElement));
    echo "</p>";
    if (is_dir($currentElement)) {
        echo "<p><strong>Number of items: </strong>";
        echo count(scandir($currentElement)) - 2;
        echo "</p>";
    } else {
        echo "<p><strong>Extension: </strong>";
        if (isset(pathinfo($currentElement)['extension'])) {
            echo pathinfo($currentElement)['extension'];
        } else {
            echo "unknown";
        }

        echo "</p>";
    }
} else {
    echo "<p>Something went wrong...</p>";
}
