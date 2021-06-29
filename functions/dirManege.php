<?php
  session_start();
   
  // echo $_SESSION["actualDir"];
    function makedir(){ 
      $path=$_SESSION["actualDir"];
      $dirname=$_POST["dirname"];
      if($_SESSION["inside"]){

         mkdir("$path/$dirname"); 
       }else{
      
        if(file_exists("../directories/$dirname")){
          $_SESSION["existingFolder"] = "this folder already exist";   
        }else{
          mkdir("../directories/$dirname"); 
          unset($_SESSION["existingFolder"]); 
        }          
        
      }
      header("Location:../root.php");    
    }

    function scanDirs(){
      $path="./directories";
      if(isset($_SESSION["actualDir"])){
        $selectedFolder=($_SESSION["actualDir"]);
        $path="$path$selectedFolder";
        
      }else{
        $path=$path;
      }
      
      echo $path;

      $scan= scandir($path);    
      $items=array_diff($scan,array('.','..'));
      echo "<a href='./dirManege/back.php' class='backbuton'>back";
      echo "</a>";
      // $_SESSION["dirs"]=$dirs;
      foreach($items as $item){
        

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
     
    function scanDirsContent(){ 
      
      // if(isset($_SESSION["actualDir"])){
      //   $selected=$_SESSION["actualDir"];
      // }else{
      //   $selected="";
      // }
      // echo "this is $selected";
      // $path="./directories$selected";
      // $allDirs= scandir("$path");
      // $dirs=array_diff($allDirs,array('.','..'));
      // echo $_SESSION["actualDir"];
   
      // foreach($dirs as $item){
      //   if(is_dir("$path/$item")){
      //     echo "<div id='$item' class='folder'>";
      //     echo "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='rgb(238, 211, 163)' class='bi bi-folder' viewBox='0 0 16 16'>
      //     <path d='M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z'/>
      //     </svg>";
      //     echo nl2br("\n $item\n");
      //     echo "<ul class='deleteEditOp'>";
      //     echo "<li id='delete' class=OpEditDel><a href='./dirManege/delete.php?deletedDir=$item' class='btn btn-outline-secondary'>Delete</a>";
      //     echo "</li>";
      //     echo "<li id='edit' class=OpEditDel><button id='$item' class='btn btn-outline-secondary'>Edit</button>";
      //     echo "</li>";
      //     echo "</ul>";
      //     echo "</div>";
      //   }else{
      //     echo "<div id='$item' class='folderInside'>";
      //     echo "<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' fill='blue' class='bi bi-file-earmark-fill' viewBox='0 0 16 16'>
      //     <path d='M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z'/>
      //     </svg>";
      //     echo nl2br("\n $item\n");
      //     // echo "<ul class='deleteEditOp'>";
         
      //     // echo "<li id='delete' class=OpEditDel><a href='./dirManege/delete.php?deletedDir=$item' class='btn btn-outline-secondary'>Delete</a>";
      //     // echo "</li>";
      //     // echo "<li id='edit' class=OpEditDel><button id='$item' class='btn btn-outline-secondary'>Edit</button>";
      //     // echo "</li>";
      //     // echo "</ul>";
          
      //     echo "</div>";
      //   }
    
      //   }; 
   //header("Location:root.php?ubication=$newDirection");
    }

    function editFolderName(){
      $newName=$_POST["editDirName"];
      $oldName=$_GET["oldName"];
      rename("../directories/$oldName","../directories/$newName");
      header("Location:../root.php");

    }

    function removeDir(){
      $deletedDir=$_GET['deletedDir'];
    
      if (is_dir("../directories/$deletedDir")){
        $dir=array_diff(scandir("../directories/$deletedDir"),array('.','..'));
          foreach($dir as $file){
          unlink("../directories/$deletedDir/$file"); 
        }
        rmdir("../directories/$deletedDir");
      }else{
        unlink("../directories/$deletedDir");
      }
      header("Location:../root.php");
      
    }

