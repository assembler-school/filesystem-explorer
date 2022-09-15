

<?php

require_once("index.php");
require_once("logos.php");

 //echo "hola";
 if(isset($_GET['search-pattern']) ){
 
    $pattern=$_GET['search-pattern'];
    echo "<h3 class='text-center'>Search results</h3>";
    search($pattern,$url);  
}

$url="ROOT";
 



 function search($pattern,$url){
    
 ?>

 <?php
 
 //require_once("index.php");
 


     if(is_dir($url)){
         if ($fh = opendir($url) ){
            while(($entry = readdir($fh)) !== false) {
               $thisEntry=$url . DIRECTORY_SEPARATOR . $entry;
                if ($entry != "." && $entry != ".."){
                    $info = pathinfo($thisEntry);
                    if(stripos($info["filename"], $pattern) !== false ){
                        
                 ?>      
                 
                <div class="d-flex text-muted pt-3 mx-5">
       <div> <?php extenFiles($thisEntry) ?></div>
          <div class=" container-sm  mb-0  border-bottom w-100">
            <div class="row">
         
              <a class="text-gray-dark col" href="index.php?name=<?php echo $url?>"><strong> <?php echo $entry ?></strong></a>
              <p class="col text-center"><?php echo filesize($thisEntry)/1000 . "KB" ?></p>
              <p class="col text-end"><?php echo date("F d Y H:i:s", 
                              filemtime($thisEntry)); //$_SESSION["urlSon"]=$thisEntry2;
                              
                              ?>                       

     <a href='deleteFiles.php?name=<?php echo $thisEntry; ?>' class="me-3 mx-4 fs-6 "><i class="fa-solid fa-trash text-secondary"></i></a>
     <a href='renameFiles.php?name1=<?php echo $folders[$indexArray++];?> 'class="me-4 mx-1 fs-6 " ><i class="fa-regular fa-file"></i></a>
               </p></div>
          </div>
        </div> 
       
          
                   
                <?php    
             } 
             if(is_dir($thisEntry)){
                search($pattern,$thisEntry);
         }
     }
 }
 }
}
}
 ?>
 

 
 


