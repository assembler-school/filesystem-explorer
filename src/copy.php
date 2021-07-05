<?php

session_start();

$completePath = $_SESSION['currentPath'];

function nameCheck($name, $currentPath, $file_parts)
{
    if (in_array($name, scandir($currentPath))) {
        $n = 0;
        $newName = $name;
        while (in_array($newName, scandir($currentPath))) {
            $n++;
            if ($file_parts['extension']) {
                $newName = $file_parts['filename'] . "(" . $n . ")." . $file_parts['extension'];
            } else {
                $newName = $file_parts['filename'] . "(" . $n . ")";
            }
        }
        return $newName;
    }
    return $name;
}

function copyAll($copied, $newDir)
{
    $files = array_diff(scandir($copied), array('.', '..'));

    foreach ($files as $file) {
        if (is_dir($copied . "/" . $file)) {
            mkdir($newDir . "/" . $file);
            copyAll($copied . "/" . $file, $newDir . "/" . $file);
        } else {
            copy($copied . "/" . $file, $newDir . "/" . $file);
        }
    }
}

if (isset($_GET['n'])) {
    $name = $_GET['n'];
    $currentPath = "../" . substr($completePath, strpos($completePath, "root"));
    $copied = $currentPath . "/" . $name;
    $file_parts = pathinfo($name);

    if (is_dir($copied)) {
        $revisedName = nameCheck($name, $currentPath, $file_parts);
        mkdir($currentPath . "/" . $revisedName);
        $newDir = $currentPath . "/" . $revisedName;
        copyAll($copied, $newDir);
    } else {
        $revisedName = nameCheck($name, $currentPath, $file_parts);
        copy($copied, $currentPath . "/" . $revisedName);
    }
}

header("Location: ../index.php");
