<?php
  session_start();
    function makedir(){ 
      if($_SESSION["path"]){
        $path=$_SESSION["path"];
        echo $path;
        mkdir(".$path"); 
      }else{
      $dirname=$_POST["dirname"];
        if(is_dir("../directories/$dirname")){
          $_SESSION["existingFolder"]= "this folder already exist";   
        }else{
          mkdir("../directories/$dirname"); 
          unset($_SESSION["existingFolder"]); 
        } 
      }         
        header("Location:../root.php");    
    }

    function scanDirs(){
      $allDirs= scandir("./directories");
      $dirs=array_diff($allDirs,array('.','..'));

      // $_SESSION["dirs"]=$dirs;
      foreach($dirs as $item){
        echo "<div id='$item' class='folder'>";
        echo "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='rgb(238, 211, 163)' class='bi bi-folder' viewBox='0 0 16 16'>
        <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
        </svg>";
        echo nl2br("\n $item\n");
        echo "<ul class='deleteEditOp'>";
        echo "<li id='delete' class=OpEditDel><a href='./dirManege/delete.php?deletedDir=$item' class='btn btn-outline-secondary'>Delete</a>";
        echo "</li>";
        echo "<li id='edit' class=OpEditDel><button id='$item' class='btn btn-outline-secondary'>Edit</button>";
        echo "</li>";
        echo "</ul>";
        
        echo "</div>";
        }; 
    }
     
    function scanDirsContent($newDirection){ 
      $allDirs= scandir("../directories/$newDirection");
      $dirs=array_diff($allDirs,array('.','..'));

      // $_SESSION["dirs"]=$dirs;
      foreach($dirs as $item){
        echo "<div id='$item' class='folderInside'>";
        // echo "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='rgb(238, 211, 163)' class='bi bi-folder' viewBox='0 0 16 16'>
        // <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
        // </svg>";
        echo nl2br("\n $item\n");
        // echo "<ul class='deleteEditOp'>";
       
        // echo "<li id='delete' class=OpEditDel><a href='./dirManege/delete.php?deletedDir=$item' class='btn btn-outline-secondary'>Delete</a>";
        // echo "</li>";
        // echo "<li id='edit' class=OpEditDel><button id='$item' class='btn btn-outline-secondary'>Edit</button>";
        // echo "</li>";
        // echo "</ul>";
        
        echo "</div>";
        }; 
    }

    function editFolderName(){
      $newName=$_POST["editDirName"];
      $oldName=$_GET["oldName"];
      rename("../directories/$oldName","../directories/$newName");
      header("Location:../root.php");

    }

    function removeDir(){
      
      $deletedDir=$_GET['deletedDir'];
      rmdir("../directories/$deletedDir");
      header("Location:../root.php");
      
    }

