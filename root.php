<?php
  require("./functions/dirManege.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
  <body class="bod">
   <div class="closeDiv"></div>   
    <header class="navBarContain">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          <form action="./search/search.php" method="post" class="d-flex">
            <input class="form-control me-2"  name="file" type="search" placeholder="Search" aria-label="Search">
            <div id="livesearch"></div>
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <main>
      <section class="aside">
        <button  class="newFolderButon">+</button>
        <!-- <div class="optionsMenu">
          <ul class="options">
            <li class="Option"><button id="showNewFolderForm">New folder</button></li>
            <li class="Option"><button>Upload Item</button></li>
          </ul>
          <div class="newFolderForm">
            <form  action="./dirManege/create.php" method="post">
              <div class="form-floating">
                <input id="floatingInput" class="form-control" type="text" name="dirname" id="submitButon">
                <label for="floatingInput">New folder name</label>
              </div>
              <button type="submit" class="btn btn-outline-success">submit</button>   
            </form>
          </div>
        </div> -->
       
        
      </section>
            
      <section class="folders">
         
              <!-- //scanDirs();
              // if(isset($_SESSION["existingFolder"])){
              //   echo $_SESSION["existingFolder"];
              // }     -->
           
      </section>

      </main>
 
  
  <script src="script.js"></script>
  </body>
</html>
