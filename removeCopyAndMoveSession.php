<?php
session_start();

$_SESSION['moves'] = [];
$_SESSION['copies'] = [];

echo json_encode('ok');