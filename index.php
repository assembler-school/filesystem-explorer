<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  require_once('./assets/php/get_files.php');
  require_once('./assets/php/upload_file_form.php');
  ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/54141fca8b.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
  <link href="./assets/css/index.css" rel="stylesheet">
  <title>File System</title>

</head>

<body>
  <header>
    <div class="logo">
      <img src="./assets/img/logo.svg" alt="Logotipo" height="45px">
    </div>
    <nav>
      <form class="d-flex" role="search">
        <input class="form-control me-2 search-bar" type="search" placeholder="Search" aria-label="Search">
        <input class="btn btn-outline-success" type="submit" value="Search">
      </form>

      <div class="btns-file-action">
        <div class="upload-file" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <span>Upload</span>
          <i class="fa-solid fa-arrow-up-from-bracket"></i>
        </div>

        <div class="new-folder">
          <span>New Folder</span>
          <i class="fa-solid fa-folder-plus"></i>
        </div>

        <div class="move-file">
          <span>Move File</span>
          <i class="fa-solid fa-file-export"></i>
        </div>
        <div class="delete-file">
          <span>Delete</span>
          <i class="fa-solid fa-trash"></i>
        </div>
      </div>
    </nav>
  </header>

  <aside>
    <h3 class="title-folders">Your folders</h3>
    <ul id="folderManager">
      <li id="rootFolder">My Files</li>
      <?php getFolders('./root'); ?>
    </ul>
  </aside>

  <main>
    <h3 class="title-files">Your files</h3>
    <?php getFiles('./root'); ?>
  </main>

  <!-- Modal SECTION -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="uploadFileForm">
          <form class ="upload-form" enctype="multipart/form-data" method="post" action="./assets/php/upload_file.php">
            <label for="userfile">Select file:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> <!-- Limit file size to a value in bytes  -->
            <input name="userfile" type="file" required>
            <label for="directory">Select target folder:</label>
            <select name="directory" id="selectDirectory">
              <option value="./root" selected>My Files/</option>
              <?php createOptions('./root') ?>
            </select>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Upload">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>

</html>