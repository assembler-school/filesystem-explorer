<?php
require_once('./utils.php');

session_start();
$_SESSION['recovers'] = [];
Utils::saveSession(SESSION);
echo json_encode('ok');