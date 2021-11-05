<?php

if (isset($_FILES['file']['name'])) {

    $target_dir = '../../storage/';
    $target_file = $target_dir . basename($_FILES['file']['name']);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
        echo  $response;
    } else {

        $response = false;
    }

    exit;
}
