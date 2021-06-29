<?php
$rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
session_start();
require("./src/modules/upload.php");
require_once("./src/modules/set_dir.php");

// echo $_SESSION["currentPath"];
// echo "<br/>";

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Manager</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ecea200bd3.js" crossorigin="anonymous"></script>
  <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="./src/assets/css/styles.css">
</head>

<body>
  <div class="row">
    <div class="col col-12 title d-flex align-items-center justify-content-center">
      <img src="./src/assets/img/logo-orange-01.png">
      <h2>Filesystem Explorer</h2>
    </div>
  </div>
  <main class="main_container container">
    <div class="top_container row">
      <form class="form-inline search_bar col col-12 d-flex">
        <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-search" type="submit">Search</button>
      </form>
      <div class="col-6"></div>
      <form class="form-inline search_bar col col-6 d-flex" action="./src/modules/creating_folder.php" method="POST">
        <input class="form-control" type="text" name="folderName" placeholder="Folder name..." id="folderName">
        <button class="btn btn-new-folder" type="submit">New Folder</button>
      </form>

      <div class="col col-12 current_path">
        <?php require_once("./src/modules/set_navbar.php"); ?>
      </div>
    </div>
    <div class="content-container">
      <table class="table">
        <thead>
          <tr>
            <th class="col col-3" scope="col">File name</th>
            <th class="col col-2" scope="col">Creation date</th>
            <th class="col col-2" scope="col">Modified date</th>
            <th class="col col-1" scope="col">Ext</th>
            <th class="col col-2" scope="col">Size</th>
            <th class="col col-2" scope="col"></th>
          </tr>
        </thead>
        <tbody class="table-content">
          <?php require_once("./src/modules/set_files_info.php") ?>
        </tbody>
      </table>
    </div>
  </main>
  <?php
  require("./src/modules/modal.php");
  ?>
  <aside class="aside_left">
    <form action="" method="POST" enctype="multipart/form-data">
      <input class="text-center new_fileBtn align-items-center" type="file" name="file" onchange="form.submit()">
    </form>
  </aside>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="src/assets/js/getModalInfo.js"></script>

</html>