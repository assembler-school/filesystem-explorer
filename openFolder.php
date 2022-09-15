      <?php

      require_once("index.php");
      require_once("updatesession.php");
      require_once("logos.php");
      require_once("openFiles.php");
      //require_once("renameFiles.php");
      $entry2=null;

      if(isset($_GET['name']) ){ 
         $url=$_GET['name'];  
            
      }else{

      $url="ROOT";
      }
      //configurate actual url  in session
      $_SESSION["newsession"]=$url;
      //call actual session function 
      //check if it doesnt need the atualsession function and works only with session calll
      actualSession($_SESSION["newsession"]);


         //function to open the folders
      function openFolder (){
         $url=$_SESSION["newsession"];
         $folders=[];
         $indexArray=0;

         if(is_dir($url)){
            if ($fh = opendir($url) ){
               while(($entry2 = readdir($fh)) !== false) {
                  $thisEntry2=$url . DIRECTORY_SEPARATOR . $entry2;
                     if ($entry2 != "." && $entry2 != ".."){
                     array_push($folders,$thisEntry2);
                  
                     
                     ?>
      <div class="d-flex text-muted pt-3">
          <div> <?php extenFiles($thisEntry2) ?></div>
          <div class=" container  mb-0  border-bottom w-100">
              <div class="row">

                  <a class="text-gray-dark col" href="index.php?name=<?php echo $thisEntry2?>"><strong>
                          <?php echo $entry2 ?></strong></a>
                  <p class="col text-center"><?php echo filesize($thisEntry2)/1000 . "KB" ?></p>
                  <p class="col text-end"><?php echo date("F d Y H:i:s", 
                                    filemtime($thisEntry2)); //$_SESSION["urlSon"]=$thisEntry2;
                                    
                                    ?>

                      <a href='deleteFiles.php?name=<?php echo $thisEntry2; ?>' class="me-3 mx-4 fs-6 "><i
                              class="fa-solid fa-trash text-secondary"></i></a>
                      <a href='renameFiles.php?name1=<?php echo $folders[$indexArray++];?> ' class="me-4 mx-1 fs-6 "><i
                              class="fa-regular fa-file"></i></a>
                      <!--<button href='renameFiles.php?name= echo $thisEntry2' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
      rename
         </button> -->
                  </p>
              </div>
          </div>
      </div>

      <?php             
                  
                  } 
                  
            }

         }

      
         }else{
      ?>
      <!-- Full screen modal -->
      <div class="modal-fullscreen-sm-down">

          <?php 
      openFiles($url);
      ?>
      </div>
      <?php

         }
      
      }






      ?>


      <?php 


?>