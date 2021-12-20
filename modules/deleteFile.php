<?php



if (isset($_GET["fileName"])){
    $root=$_GET["root"];
    $fileName=$_GET["fileName"];
    $fileUnlink= ".".$root."/".$fileName;
    unlink($fileUnlink);
    header("Location:../index.php?error='FileDelete'");
  }
  else if(isset($_GET["root"])) {
    $root=$_GET["root"];
        // try{
        rmdir(".".$root);
            if(is_dir(".".$root)){
                // throw new Exception("dont delete");
                header("Location:../index.php?error='FolderNotDeleted'");
               
            }
            else {
                header("Location:../index.php?error='FolderDeleted'");
            }
            // header("Location:../index.php?error='FolderNoEmpty'");
        }
        // // catch(Throwable $t)
        // {
        //    header("Location:../index.php?error="."echo $t->getMessage()");
        // }
    // }

// header("Location:../index.php?error='FolderNoEmpty'");
