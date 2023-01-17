<?php
require_once('./utils.php');

session_start();
$_SESSION['recovers'] = [];
Utils::saveSession('sessionfile.txt');
echo json_encode('ok');