<?php
$rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";
$currentPath = $rootPath;

// Getting files and folders from directory
$filesDir = scandir($currentPath);
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Manager</title>
  <link rel="stylesheet" href="./assets/css/styles.css">
  <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <form class="form-login row" action="./src/creatingFolder.php" method="POST">
    <div class="col col-6">
      <input type="text" name="folderName" placeholder="Folder name" id="folderName" class="form-control">
    </div>
    <div class="col col-6">
      <button class="btn btn-primary" type="submit">New Folder</button>
    </div>
  </form>
  <main class="main_container">
    <div class="top_container">
      <form class="form-inline search_bar">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 search_btn" type="submit">Search</button>
      </form>
      <div class="current_path"></div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">File name</th>
          <th scope="col">Creation date</th>
          <th scope="col">Modified date</th>
          <th scope="col">Extension</th>
          <th scope="col">Size</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i = 2; $i < count($filesDir); $i++) : ?>
          <tr>
            <th scope="row"><?php echo $filesDir[$i]; ?></th>
            <td><?php echo (date("d-m-Y H:i", filectime($rootPath . "/" . $filesDir[$i]))); ?></td>
            <td><?php echo (date("d-m-Y H:i", filemtime($rootPath . "/" . $filesDir[$i]))); ?></td>
            <td><?php
                if (!is_dir($rootPath . "/" . $filesDir[$i])) {
                  echo (pathinfo($rootPath . "/" . $filesDir[$i])["extension"]);
                }
                ?></td>
            <td><?php echo (filesize($rootPath . "/" . $filesDir[$i])) ?></td>
          </tr>
        <?php endfor ?>
      </tbody>
    </table>
  </main>
  <?php
  require("./upload.php")
  ?>
  </main>
  <aside class="aside_left">
    <form action="index.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file"> <br>
      <input class="new_fileBtn" type="submit" value="upload">
    </form>
  </aside>
  <script src="node_modules\bootstrap\dist\js\bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>