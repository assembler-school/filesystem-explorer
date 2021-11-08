
<?php

session_start();
// has to return all de files that has a particular word or part of the word in the $fileName
require_once(ROOT . "/utils/getFolderContent.php");

function searchItem(){

  //getAllItems in Drive
  $content = ["files" => [], "folders" => []];

  $query= $_SESSION["search"];

  $allFiles=getFolderContent("ROOT");
  //have to do this for every folder

    foreach( $allFiles["files"] as $item){
      if (str_contains($item["name"] , $query)) {
        array_push( $content["files"], $item );
      }
    }

    foreach( $allFiles["folders"] as $item){
      if (str_contains($item["name"] , $query)) {
        array_push( $content["folders"], $item );
      }
    }


  $_SESSION['QUERY']= $content;

}