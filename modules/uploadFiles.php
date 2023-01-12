<?php
session_start();
$currentPath = '../root';

if (isset($_SESSION['curr_path'])) {
	$currentPath = '.' . $_SESSION['curr_path'];
}


if (isset($_FILES['file'])) {

	$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

	$newFileName = $_FILES['file']['name'];

	move_uploaded_file($_FILES['file']['tmp_name'], $currentPath . '/' . $newFileName);

	echo json_encode(["extension" => $extension, "fileName" => $_FILES['file']['name']]);
}
