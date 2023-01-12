<?php


function getInfo($ff = './root')
{
    // $path= $ff;
    // $explodedSlash = explode('/', $path);
    
    // if(is_dir($ff)){
    //     $name = $explodedSlash[count($explodedSlash)-1];
    //     $type = 'Folder';
    //     $size = getDirectorySize($ff);
    //     $lastUpdateDate = date("d-m-y - H:i:s", filemtime($ff));
    //     $creationDate = date("d-m-y - H:i:s", filectime($ff));;
    // } else if(is_file($ff)){
    //     $explodedDot = explode('.', $path);
    //     $name = explode('.',$explodedSlash[count($explodedSlash)-1])[0];
    //     $size = filesize($ff);
    //     $lastUpdateDate = date("d-m-y - H:i:s", filemtime($ff));
    //     $creationDate = date("d-m-y - H:i:s", filectime($ff));;
    //     $type = $explodedDot[count($explodedDot)-1];
    // }
    $name = 'Hi world!';
    $type = 'Hi world!';
    $size = 'Hi world!';
    $lastUpdateDate = 'Hi world!';
    $creationDate = 'Hi world!';

    echo "
    <div class='file-details-container'>
        <div class='file-details-container-items'> 
            <p class='file-details-item'>Name</p>
            <p class='file-details-item'>$name</p>
            <p class='file-details-item'>Extension</p>
            <p class='file-details-item'>$type</p>
            <p class='file-details-item'>Size</p>
            <p class='file-details-item'>$size</p>
            <p class='file-details-item'>Last update</p>
            <p class='file-details-item'>$lastUpdateDate</p>
            <p class='file-details-item'>Created</p>
            <p class='file-details-item'>$creationDate</p>
        </div>
    </div>
            ";
};

getInfo('./root');

function getDirectorySize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false && $path!='' && file_exists($path)){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    return $bytestotal;
}