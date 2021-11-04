<?php
$eraseDir = $_GET["erase"];
print_r(pathinfo($eraseDir));
if (is_dir($eraseDir) == true) {
    rmdir($eraseDir);
} else {
    unlink($eraseDir);
}
header("Location:./index.php");
