<?php
session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = "../" . substr($completePath, strpos($completePath, "root"));
$deleted = $currentPath . "/" . $_POST['deleteNameInput'];

function deleteAll($deletedElement)
{
    if (is_dir($deletedElement)) {
        $files = array_diff(scandir($deletedElement), array('.', '..'));

        foreach ($files as $file) {
            (is_dir($deletedElement . "/" . $file) ? deleteAll($deletedElement . "/" . $file) : unlink($deletedElement . "/" . $file));
        }

        rmdir($deletedElement);
    } else {
        unlink($deletedElement);
    }

    header("Location: ../index.php");
}

deleteAll($deleted);
