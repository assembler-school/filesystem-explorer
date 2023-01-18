<?php

if (isset($_REQUEST["name"])){
    $name=$_REQUEST["name"];
    echo $name;
}

if ($name !== "" && isset($_GET['nameFolder'])){
        
    $newFolderName = $_GET['nameFolder'];

    $folder = json_encode($newFolderName);

    echo $folder;

    mkdir("./root/$name/$newFolderName", 0777);

} else if ($name === "" && isset($_GET['nameFolder'])){

    $newFolderName = $_GET['nameFolder'];
    
    $folder = json_encode($newFolderName);
    
    echo $folder;
    
    mkdir("./root/$newFolderName", 0777);

}

?>