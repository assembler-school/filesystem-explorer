<?php
session_start();
if (!isset($_SESSION['currentPath'])) {
  $_SESSION['currentPath'] = './root';
};

$currentPath = $_SESSION['currentPath'];

if (isset($_GET["path"])) {
  $currentPath = $_GET["path"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/styles/content.css">
  <title>FileSystem Explorer</title>
</head>

<body class="bg-dark">
  <header class="p-3 text-white">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
            <path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
          </svg>
          <h3 class="ms-2">FileSystem Explorer</h3>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-dark bg-secondary mx-4 rounded px-3">
    <!-- botones ruta -->
    <div class="d-flex">
      <div>
        <button class="btn btn-danger me-2">BACK</button>
      </div>
      <div>
        <?php
        $cleanPath = substr($currentPath, strpos($currentPath, "root"));
        $pathArr = explode("/", $cleanPath);

        foreach ($pathArr as $dir) {
          $originalPath = substr($currentPath, 0, strpos($currentPath, $dir));
          if ($originalPath . $dir == $currentPath) {
            echo "<div class='btn bg-primary text-white'>$dir</div>";
          } else {
            echo "<a href='?path={$originalPath}{$dir}'><div class='btn btn-primary me-2'>$dir</div></a>";
          }
        }
        ?>
      </div>
    </div>
    <!-- botones createfolder && upload -->
    <div>
      <button class="btn btn-dark">CREATE FOLDER</button>
      <button class="btn btn-light">UPLOAD FILE</button>
    </div>
  </nav>

  <main class="mx-4">
    <div class="my-2">Directories</div>
    <!-- folder container -->
    <div class="d-flex">
      <?php require_once('./src/fillContentDirectories.php'); ?>
    </div>
    <div class="my-2">Files</div>
    <!-- files container -->
    <div class="d-flex">
      <?php require_once('./src/fillContentFiles.php'); ?>
    </div>
  </main>
</body>

</html>