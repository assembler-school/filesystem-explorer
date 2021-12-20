<?php
$path = "./root";
$newDir = new DirectoryIterator($path);
foreach ($newDir as $fileinfo) {
    if (isset($_GET["$newDir"])){
        $newPath= "./root/$newDir";
        // // echo $newPath;
         $probandol= new DirectoryIterator($newPath);
         //print_r($probandol) ;
        foreach($probandol as $pr) {
            if(!$pr->isDot()){
                echo $pr -> getFilename()."<br>";
                $pr -> getExtension();
                // echo $pr->getFileInfo();
            }
        }
    }
};

function filesIcon($extension){
switch($extension){
    case "doc":
        
        break;
}
}