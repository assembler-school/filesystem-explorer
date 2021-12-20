<?php

if(isset($_POST['create_file']))
{
  $file_name=$_POST['file_name'];
  $newFile =fopen("root/file_name", "w+") or die("Archivo not found");
  fwrite($newFile, $txt);
 fclose($newFile);
}

?>