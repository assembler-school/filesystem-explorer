<?php
require_once('./appLoad.php');
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
<?php include('./header.php') ?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <h4 class="text-white m-0 ms-4">File Explorer</h4>
        <a href="?p=" class="home-btn folder-btn m-3"><i class="bi bi-house"></i></a>
      <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"></span>
      </button>

      <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <?php if (strlen($_SESSION['relativePath']) !== 0) {
                ?>
                <li class="breadcrumb-item active"><a class="text-white" href="?p=">Home</a></li>
                <?php
              } else {
                ?>
                <li class="breadcrumb-item text-white">Home</li>
                <?php
              }

              $array = Utils::getBreadcrumb($_SESSION['relativePath']);
              $array = array_values($array);

              for ($i = 0; $i < count($array); $i++) {
                if (strlen($array[$i]) !== 0) {
                  if ((count($array) - $i) > 1) {
                    ?>
                    <li class="breadcrumb-item <?php echo 'active' ?>">
                      <a class="text-white" href="?p=<?php
                      for ($x = 0; $x <= $i; $x++) {
                        echo $array[$x];
                        if ($i > 0 && $x < $i)
                          echo '/';
                      }
                      ?>">
                        <?php echo $array[$i] ?>
                      </a>
                    </li>
                    <?php
                  } else {
                    ?>
                    <li class="breadcrumb-item text-white">
                      <?php echo $array[$i] ?>
                    </li>
                    <?php
                  }
                }
              }
              ?>
            </ol>
          </nav>
      </div>
      <form class="d-flex me-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="file-upload" class="custom-file-upload m-2 me-4">
          <i class="bi bi-cloud-upload m-2"></i>Upload
        </label>
        <input name="userfile" type="file" id="file-upload" onchange="uploadFile();">
      </form>

      <form action="create.php" method="POST" id="createForm">
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
    <form onsubmit="deleteAll(event);">
      <button type="submit" class="btn btn-outline-danger">
        <i class="bi bi-trash2"></i>
        Delete All
      </button>
    </form>
  </article>
  <?php include('./footer.php') ?>