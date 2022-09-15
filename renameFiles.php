<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="sidebars.css" rel="stylesheet">
</head>
<body>
    
<?php  
session_start();
$url=$_SESSION["newsession"];
//$urlSon=$_SESSION["urlSon"];
    //$file_pointer=$_GET["name"];

    if(isset($_GET['name1'])){
        $urlSon=$_GET['name1'];

    }
   
    if(isset($_GET['newName'] )){ 
      //$urlSon=$_GET['name1'];
      $newName= $url . DIRECTORY_SEPARATOR.$_GET['newName'];
      renamej($urlSon,$newName,$url);
    }
    


function renamej($thisEntry2,$newUrl,$url){  //renames 
    
    rename($thisEntry2,$newUrl);
    
    header("Location:index.php?name=$url");
   
 }
 
 

?>



 
<div class="container-sm mb-5 ">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
 
       
      </div>
      <form action="renameFiles.php" method="get">
        
            <div class="modal-body">


            <h5 class="modal-title" id="exampleModalLabel">Old folder Name</h5>
            <div class="input-group input-group-sm mb-3">
             <span class="input-group-text" id="inputGroup-sizing-sm"></span>
            <input type="text" name="name1" class="form-control" placeholder="<?php echo $urlSon;?>" value="<?php echo $urlSon;?>" aria-describedby="inputGroup-sizing-sm"></input>
            </div>
            
            
            <h5 class="modal-title" id="exampleModalLabel">New folder Name</h5>
             <div class="input-group input-group-sm mb-3">
             <span class="input-group-text" id="inputGroup-sizing-sm"></span>
             
             <input type="text" name="newName"class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
             </div>
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>
<?php


