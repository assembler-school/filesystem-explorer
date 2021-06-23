<?php
session_start();
function makedir(){
    $dirname=$_POST["dirname"];
    mkdir("./test/$dirname");
  }

function scan(){
  $dirs= scandir("./test");
  // $_SESSION["dirs"]=$dirs;
  foreach($dirs as $item){
    echo "<div id='$item' class='folder'>";
    echo nl2br("\n $item\n");
    echo "<a href='./dirManege/delete.php?deletedDir=$item' class='buton'>Delete";
    echo "</a>";
    echo "</div>";

    }; 
}

function removeDir(){
  $deletedDir=$_GET['deletedDir'];
 rmdir("../test/$deletedDir");
 header("Location:../root.php");
  
}