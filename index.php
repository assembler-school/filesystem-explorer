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
      <div class="d-flex">
        <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search"
          onkeyup="searchFile(event)">
      </div>
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

  <!-- DELETE ALERT -->
  <div id="liveAlertPlaceholder"></div>

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
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
      onclick="type_all();">
      <i class="bi bi-trash2"></i>
      Delete All
    </button>
  </article>

  <!-- DELETE MODAL  -->
  <div class="modal" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <form id="deleteForm">
            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include('./footer.php');

  if (isset($_SESSION['relativePath'])) {
    $returnPath = $_SESSION['relativePath'];
  }
  $project = explode('/', $_SERVER['REQUEST_URI'])[1];

  if (isset($_REQUEST['rar'])) {
    if ($_REQUEST['rar'] == 1) {
      ?>
      <script>
        const alert = document.getElementById('liveAlertPlaceholder');
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
          `<div class="alert alert-success alert-dismissible mt-3 col-2 offset-md-5" role="alert">`,
          `   <div class="fw-bold">File extracted succesfully</div>`,
          '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
          '</div>'
        ].join('')
        setTimeout(() => {
          alert.firstChild.remove();
        }, 2000);
        alert.append(wrapper)
        window.history.pushState("", "", "<?php echo '/' . $project . '/' . $returnPath ?> ");
      </script>
      <?php
    } else {
      ?>
      <script>
        const alert = document.getElementById('liveAlertPlaceholder');
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
          `<div class="alert alert-warning alert-dismissible mt-3 col-2 offset-md-5" role="alert">`,
          `   <div class="fw-bold">File already exists!</div>`,
          '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
          '</div>'
        ].join('')
        setTimeout(() => {
          alert.firstChild.remove();
        }, 2000);
        alert.append(wrapper)
        window.history.pushState("", "", "<?php echo '/' . $project . '/index.php?p=' . $returnPath ?> ");
      </script>
      <?php
    }
  }

  ?>