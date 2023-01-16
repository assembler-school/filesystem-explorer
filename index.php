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

if (!isset($_SESSION['moves'])) {
  $_SESSION['copies'] = [];
  $_SESSION['moves'] = [];
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
        <form onsubmit="advancedSearch(event)">
          <input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search"
            onkeyup="searchFile(event)" <?php if (isMoveActive()) {
        ?> disabled<?php
      } ?>>
          <input type="submit" style="display: none">
        </form>
      </div>
      <form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
        <label for="file-upload" class="custom-file-upload m-2 me-4"   <?php if (isMoveActive()) {
        ?> style="cursor: default; pointer-events: none"<?php
      } ?>>
          <i class="bi bi-cloud-upload m-2"></i>Upload
        </label>
        <input name="userfile" type="file" id="file-upload" onchange="uploadFile();">
      </form>
      <button class="custom-file-create m-2 me-4 folder-btn" data-bs-toggle='modal' data-bs-target='#createModal' id="openCreateModal"
      <?php if (isMoveActive()) {
        ?> disabled style="cursor:inherit; pointer-events: none"<?php
      } ?>>
        <i class="bi bi-plus-square m-2"></i>Create
      </button>
    </nav>
  </header>

  <div id="liveAlertPlaceholder"></div>

  <?php
  if (isset($_REQUEST['trash'])) {
    ?>
    <div class="d-flex ms-3 mt-3 align-items-center">
      <a class="link text-primary fw-bold me-3" href="index.php?p=<?php echo $_SESSION['relativePath'] ?>">
        <i class="bi bi-arrow-90deg-left"></i>
        Back
      </a>
      <i class="bi bi-trash3-fill me-2"></i>
      <h4 class="m-0 mt-1">TRASH</h4>
    </div>
    <?php
  }


  ?>
  <article class="container-fluid">
    <form action="index.php" method="POST" id="form"></form>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th class="p-3" scope="col">Name</th>
          <th class="p-3" scope="col">Size</th>
          <?php
          if (!isset($_REQUEST['trash'])) {
            ?>
            <th class="p-3" scope="col">Last Modification</th>
            <?php
          } else {
            ?>
            <th class="p-3" scope="col"></th>
            <?php
          }
          ?>
          <th class="p-3" scope="col">Actions</th>
        </tr>
      </thead>
      <tbody id="tbody">
        <?php
        if (isset($_REQUEST['trash'])) {
          $quantity = loadFiles('./trash', false);
        } else {
          $quantity = loadFiles($folderPath, true);
        }
        ?>
      </tbody>
    </table>
    <?php
    $absolutePath = $_SESSION['absolutePath'];
    if (count($_SESSION['moves']) > 0) {
      foreach ($_SESSION['moves'] as $move) {
        $route = explode('/', $move);
        array_pop($route);
        $movePath = implode('/', $route);
      }
    } else {
      foreach ($_SESSION['copies'] as $move) {
        $route = explode('/', $move);
        array_pop($route);
        $movePath = implode('/', $route);
      }
    }
    ?>
    <form action="./paste.php">
      <button type="submit" class="btn btn-outline-success" id="pasteFunction" <?php
      if (isMoveActive() && $absolutePath !== $movePath)
        echo 'style="display:inherit"';
      else
        echo 'style="display:none"'
          ?>>
          <i class="bi bi-clipboard-check"></i>
          Paste
        </button>
      </form>
      <?php

      if (isset($_REQUEST['trash']) && $quantity > 0) {
        ?>
      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
        id="emptyTrash" onclick="deleteTrashModal();">
        <i class="bi bi-recycle"></i>
        Empty Trash
      </button>
      <?php
      } else if (!isset($_REQUEST['trash'])) {
        if ($quantity > 0) {
          ?>
          <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
            onclick="deleteAllModal();" id="emptyAll" <?php
            if (isMoveActive())
              echo 'style="visibility:hidden"';
            else
              echo 'style="visibility:visible"'
                ?>>
              <i class="bi bi-trash3"></i>
              Delete All Files
            </button>
        <?php
        }

        if (count(array_diff(scandir('./trash'), array('.', '..'))) > 0) {
          ?>
          <a class="btn btn-outline-primary" href="index.php?trash" id='openTrash' <?php
          if (isMoveActive())
            echo 'style="visibility:hidden"';
          else
            echo 'style="visibility:visible"'
              ?>>
              <i class="bi bi-battery-charging"></i>
              Open Trash
            </a>
        <?php
        } else {
          ?>
          <a class="btn btn-outline-primary" href="index.php?trash" id='openTrash' <?php
          if ($_SESSION['moves'] || $_SESSION['copies'])
            echo 'style="visibility:hidden"';
          else
            echo 'style="visibility:visible"'
              ?>>
              <i class="bi bi-battery"></i>
              Open Trash
            </a>
        <?php
        }
      }
      ?>
  </article>

  <!--CREATE-->
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Insert the name and the extension</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="createForm" onsubmit="createFile(event)">
          <div class="modal-body">
            <input type="text" id="nameCreated">
            <select name="select" id="fileType">
              <option value="">folder</option>
              <option value=".txt">.txt</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="createBtn" class="btn btn-primary" data-bs-dismiss="modal">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL  -->
  <div class="modal" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteTitle"></h5>
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
  <!-- RENAME MODAL  -->
  <div class="modal" id="renameModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="renameForm" onsubmit="renameFile(event);">
          <div class="modal-header">
            <h5 class="modal-title" id="renameTitle"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Enter the new name</p>
            <input type="text" name="rename" id="rename">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Rename</button>
          </div>
        </form>
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
        const alert2 = document.getElementById('liveAlertPlaceholder');
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
          `<div class="alert alert-warning alert-dismissible mt-3 col-2 offset-md-5" role="alert">`,
          `   <div class="fw-bold">File already exists!</div>`,
          '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
          '</div>'
        ].join('')
        setTimeout(() => {
          alert2.firstChild.remove();
        }, 2000);
        alert2.append(wrapper)
        window.history.pushState("", "", "<?php echo '/' . $project . '/index.php?p=' . $returnPath ?> ");
      </script>
      <?php
    }
  }
  ?>