<?php



if (isset($_GET["fileName"])){
    $root=$_GET["root"];
    $fileName=$_GET["fileName"];
    echo $fileName;
    $fileUnlink= ".".$root."/".$fileName;
    echo $fileUnlink;
    unlink($fileUnlink);
    
  }
  else if(isset($_GET["root"])) {
    $root=$_GET["root"];
    
  }
// header("Location:");