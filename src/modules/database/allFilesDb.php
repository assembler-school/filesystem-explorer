<?php
session_start();

// if (!isset($_SESSION["directoryFiles"])) {
//     $_SESSION["directoryFiles"] = array();
// };

if (!isset($_SESSION["basePath"])) {
    $_SESSION["basePath"] = "./root/";
};
