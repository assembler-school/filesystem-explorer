<?php
$foldersRoot = [];

forEach ( glob( '../root/*' ) as $name ) {
    if (is_dir( $name ) && $name !== 'index.php') {
        $name = str_replace("../root/", "", $name);

        if($name === 'Trash'){
            continue;
        }

        array_push($foldersRoot, $name);
    }
}

echo json_encode($foldersRoot);