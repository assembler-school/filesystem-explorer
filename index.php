<?php
require_once('./htmlTags.php');
require_once('./LoadApp.php');
session_start();

$folderPath = './root';
if (isset($_REQUEST['p']) && strlen($_REQUEST['p']) > 0) {
  $_SESSION['relativePath'] = $_REQUEST['p'];
  $_SESSION['absolutePath'] = $folderPath . '/' . $_REQUEST['p'];
  $folderPath = $folderPath . '/' . $_REQUEST['p'];
} else {
  $_SESSION['relativePath'] = '';
  $_SESSION['absolutePath'] = ROOT;
}

?>
<?php getHeader(); ?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <h4 class="text-white m-0 ms-4">File Explorer</h4>
      <form class="navbar-brand m-0 ms-3 me-3 text-white" action="index.php" method="POST">
        <input type="hidden" name="path" value=<?php echo ROOT ?>>
        <button type="submit" class="home-btn folder-btn"><i class="bi bi-house"></i></button>
      </form>
      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
        <form action="index.php" method="POST">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item text-white">
                <input type="hidden" value=<?php echo ROOT ?>>
                <input class="folder-btn home-btn" type="submit" value="root">
              </li>
            </ol>
          </nav>
        </form>
      </div>
      <form class="d-flex me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <form action="uploadFile.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="file-upload" class="custom-file-upload m-2 me-4">
          <i class="bi bi-cloud-upload m-2"></i>Upload
        </label>
        <input name="userfile" type="file" id="file-upload" onchange="submit();">
      </form>

      <form action="createFile.php" method="POST" id="createForm">
        <label for="file-create" class="custom-file-create m-2 me-4">
          <i class="bi bi-plus-square m-2"></i></i>Create
        </label>
        <input name="userfile" type="file" id="file-upload">
      </form>

    </nav>
  </header>
  <article class="container-fluid mt-3">
    <form action="index.php" method="POST" id="form"></form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Size</th>
          <th scope="col">Last Modification</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <?php loadFiles('./root', $folderPath ? $folderPath : ROOT); ?>
      </tbody>
    </table>
  </article>
  <?php getFooter(); ?>
  <script>
    function submit() {
      document.getElementById('uploadForm').submit();
    }
  </script>