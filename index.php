<?php
$rootPath = "C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root";

session_start();
if (!isset($_SESSION["currentPath"])) {
  $currentPath = $rootPath;
  $_SESSION["currentPath"] = $currentPath;
} else {
  $currentPath = $_SESSION["currentPath"];
}

echo $_SESSION["currentPath"];
echo "<br/>";


// Getting files and folders from directory
$filesDir = scandir($currentPath);
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP File Manager</title>
  <link rel="stylesheet" href="./src/assets/css/styles.css">
  <link href="node_modules\bootstrap\dist\css\bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <form class="form-login row" action="./src/modules/creating_folder.php" method="POST">
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
      <div class="current_path">
        <a href="src/modules/updating_path.php?updatedPath=C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root">root /</a>
        <?php
        $expPath = explode("/", $currentPath);
        $folderHref = "";
        for ($i = 8; $i < count($expPath); $i++) : ?>
          <?php
          $folderHref .= "/" . $expPath[$i];
          ?>
          <a href="src/modules/updating_path.php?updatedPath=C:/xampp/htdocs/Assembler/Projects/02-php-file-manager/filesystem-explorer/root<?php echo $folderHref ?>"><?php echo $expPath[$i] ?> /</a>
        <?php endfor ?>
      </div>
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
            <?php if (is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) : ?>
              <th scope="row"><a href="src/modules/updating_path.php?updatedPath=<?php echo ($_SESSION["currentPath"] . "/" . $filesDir[$i]) ?>"><?php echo $filesDir[$i]; ?></a></th>
            <?php else : ?>
              <th scope="row"><?php echo $filesDir[$i]; ?></th>
            <?php endif ?>
            <td><?php echo (date("d-m-Y H:i", filectime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
            <td><?php echo (date("d-m-Y H:i", filemtime($_SESSION["currentPath"] . "/" . $filesDir[$i]))); ?></td>
            <td><?php
                if (!is_dir($_SESSION["currentPath"] . "/" . $filesDir[$i])) {
                  echo (pathinfo($_SESSION["currentPath"] . "/" . $filesDir[$i])["extension"]);
                }
                ?></td>
            <td><?php echo (filesize($_SESSION["currentPath"] . "/" . $filesDir[$i])) ?></td>
          </tr>
        <?php endfor ?>
      </tbody>
    </table>
  </main>
  <?php
  require("./src/modules/upload.php")
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