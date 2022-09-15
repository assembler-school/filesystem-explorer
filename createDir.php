<?php  
  session_start();
 $pathFolder=$_SESSION["newsession"];
//echo 'session'. $_POST['folder-name'];
 #if the user entered a folder name we proceed
 if(!empty($_POST["folder-name"])){
   $folderName= $_POST['folder-name'];
   
   mkdir( $pathFolder . DIRECTORY_SEPARATOR. $folderName);
        echo $pathFolder."<br>";
        echo $folderName."<br>";
        echo $pathFolder . DIRECTORY_SEPARATOR. $folderName;
        unset($_POST['folder-name']);
       header("Location:index.php?name=$pathFolder");
 }
 


if (!empty($_POST['file-name'])){
   $file = $_FILES['file-name'];
   //$file = $_POST['file-name'];
   //print_r($file);
   
   $fileName = $file['name'];
   $fileTmp = $file['tmp_name'];
   $fileError = $file['error'];
  if($fileError == 0){

     

      move_uploaded_file($fileTmp, $fileDestination);
      $fileDestination = $pathFolder . DIRECTORY_SEPARATOR. $fileName;

      //header("Location:index.php?name=$pathFolder");


  }
   
   

  // header("Location:index.php?name=$pathFolder");

}
    


   


?>



 