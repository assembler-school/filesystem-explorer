<?php

session_start();
if (isset($_GET['path'])) {
  $_SESSION['currentPath'] = $_GET['path'];
}

if (!isset($_SESSION['currentPath'])) {
  $_SESSION['currentPath'] = './root';
};

require_once('./src/folderNavigation.php');
include_once './src/fillContent.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/styles/content.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>FileSystem Explorer</title>
</head>

<body class="bg-dark">
  <header class="p-3 text-white">
    <div class="container-fluid">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="./index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16">
            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
            <path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z" />
          </svg>
          <h3 class="ms-2">FileSystem Explorer</h3>
        </a>
        <form method='GET' class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" name="search" value="<?= getFilter() ?>" autofocus>
        </form>
      </div>
    </div>
  </header>
  <nav class="navbar navbar-dark bg-secondary mx-4 rounded px-3">
    <!-- botones ruta -->
    <div class="d-flex">
      <div>
        <a href="<?= goBack() ?>" class="btn btn-danger me-2">BACK</a>
      </div>
      <div>
        <?php
        getBreadcrumbs();
        ?>
      </div>
    </div>
    <!-- botones createfolder && upload -->
    <div class="d-flex">
      <button class="btn btn-dark me-3" id="folderBtn">CREATE FOLDER</button>
      <form method="POST" enctype="multipart/form-data" action="./src/uploadFile.php">
        <label for="uploadFile" class="btn btn-light">UPLOAD FILE</label>
        <input type="file" name="uploadFile" id="uploadFile" class="hidden" onchange="form.submit()">
      </form>
    </div>
  </nav>

  <main class="mx-4">
    <?php require_once('./src/search.php'); ?>
    <div id='directories' class="my-2">Directories</div>
    <!-- folder container -->
    <div class="d-flex flex-wrap">
      <?php require_once('./src/fillContentDirectories.php'); ?>
    </div>
    <div class="my-2">Files</div>
    <!-- files container -->
    <div class="d-flex flex-wrap">
      <?php require_once('./src/fillContentFiles.php'); ?>
    </div>
  </main>

  <?php require_once './assets/modules/modules.php'; ?>

  <script src="../filesystem-explorer/assets/js/modal.js" type="module"></script>
  <script src="../filesystem-explorer/assets/js/contextMenu.js" type="module"></script>
  <script src="../filesystem-explorer/assets/js/contextOptions.js" type="module"></script>
</body>

</html>