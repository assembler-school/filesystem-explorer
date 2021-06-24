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
  <form class="newFolderForm" action="./dirManege/create.php" method="post">
        <input type="text" name="dirname" id="submitButon">
        <input type="submit" >
    </form>
      
    <header class="navBarContain">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand">Navbar</a>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <main>
      <section class="aside">
        <button  class="newFolderButon">+</button>
      </section>
            
      <section class="folders">
          <?php
            require("./functions/dirManege.php");
              scan();
              if(isset($_SESSION["existingFolder"])){
                echo $_SESSION["existingFolder"];
              }    
            ?>
      </section>
      </main>
 
  
  <script src="script.js"></script>
  </body>
</html>
