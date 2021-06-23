<?php
  session_start();
    function makedir(){   
           
       // if(!is_dir("./directories/$dirname")){
          $dirname=$_POST["dirname"];
          mkdir("../directories/$dirname");
          header("Location:../root.php");
        //}        
    }

    function scan(){
      $allDirs= scandir("./directories");
      $dirs=array_diff($allDirs,array('.','..'));

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
    rmdir("../directories/$deletedDir");
    header("Location:../root.php");
      
    }