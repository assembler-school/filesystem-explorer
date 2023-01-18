<?php

checkRequest();

function checkRequest() {

    $folder = "root/";

    if (isset($_REQUEST['name'])){

    $folder = $folder . $_REQUEST['name']."/";
    displayDirectories($folder);

    echo json_encode($folder);

    } else {

    displayDirectories($folder);
    echo "nothing";

    }
    
}

?>