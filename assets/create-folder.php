<?php
$newFolderName = '../root/'.$_GET[ 'nameFolder' ];

if ( file_exists( $newFolderName ) ) {
    $status['exists'] = true;
    $status['msg'] = 'This folder Already Exist!';
} else {
    $status['exists'] = false;
    mkdir($newFolderName, 0777);
}

echo json_encode( $status );
?>