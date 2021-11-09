<?php

require_once(ROOT."/utils/getFolderContent.php");
require_once(ROOT."/config.php");

function renderNavTree(){

  $rootDirectory = getFolderContent("ROOT"); // files & folders
  // I need the first folder to be ROOT
  $folders = array_reverse($rootDirectory["folders"]);
  $files = $rootDirectory["files"];

  // hsta mi primer carpeta , segun los path del file, es mi primer grupo
  // sgeunda carpeta incluida en el path del file es segundo grupo

  foreach ($folders as $folder){

    echo "<div class='list-group'>";
    echo  "<a href=".routingNav($folder["name"])." class='list-group-item list-group-item-action'>".$folder["name"]."</a>";

    foreach($files as $key => $file ){

      if(str_contains($file["path"], $folder["path"])){

        echo "<li class='list-group-item list-group-item-action'>".$file["name"]."</li>";
        unset($files[$key]);
      }
    }
    echo "</div>";

  }

}

function routingNav(string $path){

  if(str_contains($path, "..")) return "index.php";
  else return $path ;

}