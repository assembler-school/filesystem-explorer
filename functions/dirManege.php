<?php
  session_start();
    function makedir(){ 
      $dirname=$_POST["dirname"];
        if(is_dir("../directories/$dirname")){
          $_SESSION["existingFolder"]= "this folder already exist";   
        }else{
          mkdir("../directories/$dirname"); 
          unset($_SESSION["existingFolder"]); 
        }   
        
        header("Location:../root.php");    
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
        echo "<a href='./dirManege/edit.php?renamedDir=$item'>Edit";
        echo "</a>";
        echo "</div>";

        }; 
    }

    function removeDir(){
      
      $deletedDir=$_GET['deletedDir'];
      rmdir("../directories/$deletedDir");
      header("Location:../root.php");
      
    }

    function renameDir(){
    
      $renamedDir=$_GET['renamedDir'];
      rename("../directories/$renamedDir","../directories/$newName");
      header("Location:../root.php");
      
    }