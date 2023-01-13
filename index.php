<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script defer src="https://kit.fontawesome.com/474cc18125.js" crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
    <title>File Explorer</title>
</head>

<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">File Explorer</a>
      <form class="d-flex" role="search">

        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <form class="d-flex upload-file" method="POST" action="upload-file.php" enctype="multipart/form-data">
        <input class="form-control me-2 file-to-upload" type="file" name="file" placeholder="File name..." >
        <button class="btn btn-secondary" type="submit" name="submit">Upload</button>
      </form>
      <div class="d-flex create-folder">
        <input class="form-control me-2 folder-name" type="text" name="folder" placeholder="Folder name..." >
        <button class="btn btn-secondary create-btn">Create Folder</button>
      </div>
      


    </div>
  </div>
</nav>
</header>

<body>
<table class="table caption-top">
<button class="btn btn-outline-secondary"><a class="home" href="./index.php">Files & folders</a></button>
<?php

?>

  <thead>
    <tr>
      <th scope="col">Extension</th>
      <th scope="col">Name</th>
      <th scope="col">Creation Date</th>
      <th scope="col">Last Modified</th>
      <th scope="col">Size</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>    
      <!-- <td><i class="fa-solid fa-trash"></i><i class="fa-regular fa-pen-to-square"></i></td> -->    
    <?php


    checkRequest();

    function checkRequest() {

      $folder = "root/";

      if (isset($_REQUEST['name'])){

        $folder = $folder . $_REQUEST['name']."/";
        displayDirectories($folder);

      } else {

        displayDirectories($folder);
      }
     
    }
    function displayDirectories($folder){

      foreach (glob("$folder/*") as $dir) {
  
        if (!strpos(basename($dir), '.')) {
  
          echo "<tr>\n<th scope='row'>3</th>\n<td><form method='GET'><input type='hidden' name='name' value='". basename($dir)."'class='folder'><button type='submit'>" . basename($dir) . "</button></form></td>\n<td>" . date('d-m-Y H:i:s', filectime($dir)) . "</td>\n<td>" . date('d-m-Y H:i:s', filemtime($dir)) . "</td>\n<td>" . filesize($dir) . "</td><td><button class='fa-solid fa-trash delete-btn' actual-folder='".$dir."'></button><button class='fa-regular fa-pen-to-square edit-btn'></button></td></tr>";
  
        } else {
  
          echo "<tr>\n<th scope='row'>3</th>\n<td><a href='root/" . basename($dir) . "'>" . basename($dir) . "</a></td>\n<td>" . date('d-m-Y H:i:s', filectime($dir)) . "</td>\n<td>" . date('d-m-Y H:i:s', filemtime($dir)) . "</td>\n<td>" . filesize($dir) . "</td><td><button class='fa-solid fa-trash delete-btn'></button><button class='fa-regular fa-pen-to-square edit-btn'></button></td></tr>";
        }
      }
    }

    ?>
  </tbody>
</table>
    
</body>

</html>