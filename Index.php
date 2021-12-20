<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="./assets/js/script.js" defer></script>
    <title>Files System Explorer</title>
</head>
<body>
    <div class="jumbotron">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Our Cloud</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-start" action="./modules/createFile.php" method="POST">

                <button type="submit" formaction="./modules/createFolder.php" method="POST"name="btnNewFolder"class="btn btn-sm btn-outline-secondary me-2" type="button">New Folder</button>

                <button type="button" formaction="./modules/createFile.php" method="POST" name="btnNewFile"class="btn btn-sm btn-outline-secondary me-2" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">New File</button>

                <button name="btnUnload"class="btn btn-sm btn-outline-secondary me-2" type="button">Unload</button>

                <button name="btnDownload"class="btn btn-sm btn-outline-secondary me-2" type="button">Download</button>

                <button name="btnMove"class="btn btn-sm btn-outline-secondary me-2" type="button">Move to</button>

                <button name="btnCopy"class="btn btn-sm btn-outline-secondary me-2" type="button">Copy to</button>

                <button name="btnRename"class="btn btn-sm btn-outline-secondary me-2" type="button">Rename</button>

                <button name="btnDelete"class="btn btn-sm btn-outline-secondary me-2" type="button">Delete</button>

            </form>
        </nav>
    </div>
<div class="row">
<!-- Folders Container 1-->
    <div id="foldersContainer" class="col-4 primary foldersContainer" >
<!-- Accordion -->
        <div class="accordion" id="accordionPanelsStayOpenExample">
    <?php
    require_once("./modules/generateFoldersTree.php");
    generateFoldersTreeFun("./root");
    ?>
        </div>
    </div>

<!-- Files container 2-->

    <div class="col-4 secondary">
    <?php
    require_once("./modules/generateFiles.php");
    
    $newRoot = $_GET["root"];
    if(is_dir($newRoot)){
        generateFilesFun($newRoot);
    }else{

    }
    
    ?>
    </div>

<!-- Details and visualizer container 3-->

    <div class="col-4 primary">
    <?php

    if(isset($_GET["fileName"])){
        $fileName = $_GET["fileName"];
        require_once("./modules/readFile.php");
        readFileFun($newRoot,$fileName);
    }else{
        echo "click a file";
    }

    ?>




    </div>
</div>






<!-- MODAL -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="./modules/createFile.php?root=<?=$newRoot?>" method="POST">
              <label for="name">Nombre del archivo</label>
              <input type="text" name="fileName">
              <label for="name">Extension del archivo</label>
              <input type="text" name="fileExtension">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        
        <button type="submit" name="btnNewFile"  class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">New File</button>
        </form>
        




      </div>
    </div>
  </div>
</div>

<!-- MODAL 2 -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel2">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hola
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>





</body>
</html>
