<?php
$foldersRoot = [];

forEach ( glob( '../root/*' ) as $name ) {
    if ( is_dir( $name ) && $name !== 'index.php' ) {
        // echo '<li>
        // <div class="select-folder" name-folder="'.$name .'">
        // <img src="../image/folder.ico" alt="image folder" class="imageFolder" name-folder="'.$name .'"> ' . $name . '
        // </div>
        // <span class="modify-name-folder">
        // <i class="fa-solid fa-pen" actual-folder="'.$name .'"></i>
        // </span>
        // <span class="delete-folder">
        // <i class="fa-solid fa-trash" id="delete-folder" actual-folder="'.$name .'"></i>
        // </span>
        // </li>';

        $name = str_replace("../root/", "", $name);

        array_push($foldersRoot, $name);
    }
}

echo json_encode($foldersRoot);