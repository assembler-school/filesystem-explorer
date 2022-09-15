<?php
  session_start();
 
    //set actual directory 
    $url=$_SESSION["newsession"];
    $file_pointer=$_GET["name"];
   

// using unlink() function
function removeFolder($dirname){
   
    if(is_dir($dirname)){   //delete only folders
        $dir_handle = opendir($dirname);
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                    //si no es un directorio elemino el fichero con unlink()
                 if (!is_dir($dirname."/".$file))
                      unlink($dirname."/".$file);
                 else //si es un directorio hago la llamada recursiva con el nombre del directorio
                      removeFolder($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
     //elimino el directorio que ya he vaciado
        rmdir($dirname);


    }else{
      //delete only files
          unlink($dirname);
    }       
    }
           

removeFolder( $file_pointer);
      //redirect to same page
header("Location:index.php?name=$url");
?>
   


   






 