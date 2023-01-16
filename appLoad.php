<?php
require_once('./utils.php');
define("ROOT", "./root");

function loadFiles($path, $options)
{
  $files = array_diff(scandir($path), array('.', '..'));
  if (substr_count($path, "/") > 1) {
    paintBackRow();
  }
  $dirs = [];
  $filesInDir = [];
  foreach ($files as $file) {
    if (filetype($path . '/' . $file) == 'dir')
      array_push($dirs, $file);
    else
      array_push($filesInDir, $file);
  }

  foreach ($dirs as $dir) {
    paintFile($path, $dir, $options);
  }
  foreach ($filesInDir as $file) {
    paintFile($path, $file, $options);
  }
  if (count($files) == 0) {
    ?>
    <tr>
      <td class="fw-bold p-3">No files were found</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php
  }
  ?>
  <?php
  return count($files);
}

function paintFile($path, $file, $options)
{
  $absolutePath = $path . '/' . $file;

  if (is_dir($path . "/" . $file)) { // Si es una carpeta

    if (isset($_REQUEST['p'])) { // En navegacion entre carpetas

      $relativePath =
        strlen($_REQUEST['p']) > 0
        ? $_REQUEST['p'] . '/' . $file
        : $file;
      createFileRow($absolutePath, $relativePath, $file, true, false, $options);
    } else { // Primera apertura sin navegación

      createFileRow($absolutePath, null, $file, true, true, $options);
    }
  } else { // Si es un archivo
    createFileRow($absolutePath, null, $file, false, false, $options);
  }
}
;

function createFileRow($absolutePath, $relativePath, $fileName, $isFolder, $isRoot, $options)
{
  ?>
  <tr data-file="<?php echo $fileName ?>">
    <td class="p-3">
      <?php
      echo getTypeIcon(filetype($absolutePath), $fileName);
      $fileHref = str_replace(' ', '%20', $fileName);
      $fileHrefRelativePath = str_replace(' ', '%20', $relativePath);
      if ($isFolder) {
        if ($isRoot) {
          if ($options) {
            if (isset($_SESSION['moves'][$fileName])) {
              ?>
              <a class="folder-btn link text-white" href="#" data-change style="cursor: inherit; opacity: 0.2">
                <?php echo $fileName ?>
              </a>
              <?php
            } else if (isset($_SESSION['copies'][$fileName])) {
              ?>
                <a class="folder-btn link text-white" href="#" data-change style="cursor: inherit;">
                <?php echo $fileName ?>
                </a>
              <?php
            } else {
              ?>
                <a class="folder-btn link text-white" href="?p=<?php echo $fileHref ?>" data-change>
                <?php echo $fileName ?>
                </a>
              <?php
            }
          } else {
            ?>
            <span class="folder-btn link text-white">
              <?php echo $fileName ?>
            </span>
            <?php
          }
          ?>
        </td>
        <?php
        } else {
          if ($options) {
            if (isset($_SESSION['moves'][$fileName])) {
              ?>
            <a class="folder-btn link text-white" href="#" data-change style="cursor: inherit; opacity: 0.2">
              <?php echo $fileName ?>
            </a>
            <?php
            } else if (isset($_SESSION['copies'][$fileName])) {
              ?>
              <a class="folder-btn link text-white" href="#" data-change style="cursor: inherit;">
              <?php echo $fileName ?>
              </a>
            <?php
            } else {
              ?>
              <a class="folder-btn link text-white" href="?p=<?php echo $fileHrefRelativePath ?>" data-change>
              <?php echo $fileName ?>
              </a>
            <?php
            }
          } else {
            ?>
          <span class="folder-btn link text-white">
            <?php echo $fileName ?>
          </span>
          <?php
          }
          ?>
        </td>
        <?php
        }
      } else {
        if (isMoveActive()) {
          if (isset($_SESSION['moves'][$fileName])) {
            ?>
          <a class="link text-white" href=<?php echo "open.php?name=$fileHref" ?> data-change
            style="cursor: inherit; opacity: 0.2; pointer-events:none">
            <?php echo $fileName ?>
          </a>
          <?php
          } else if (isset($_SESSION['copies'][$fileName])) {
            ?>
            <a class="link text-white" href=<?php echo "open.php?name=$fileHref" ?> data-change
              style="cursor: inherit; pointer-events:none">
            <?php echo $fileName ?>
            </a>
          <?php
          } else {
            ?>
            <a class="link text-white" href="#" data-change style="pointer-events: none">
            <?php echo $fileName ?>
            </a>
          <?php
          }
        } else {
          if ($options) {
            ?>
          <a class="link text-white" href=<?php echo "open.php?name=$fileHref" ?> data-change>
            <?php echo $fileName ?>
          </a>
          <?php

          } else {
            ?>
          <span class="link text-white">
            <?php echo $fileName ?>
          </span>
          <?php
          }
          ?>
        </td>
        <?php
        }
      }
      ?>


    <td class="p-3">
      <?php
      if (isset($_SESSION['moves'][$fileName])) {
        echo '<p data-change style="opacity: 0.2">' . Utils::formatSize(filesize($absolutePath)) . '</p>';
      } else {
        echo '<p data-change>' . Utils::formatSize(filesize($absolutePath)) . '</p>';
      }
      ?>
    </td>
    <?php
    if ($options) {
      date_default_timezone_set('Europe/Madrid');
      ?>
      <td class="p-3">
        <?php $fecha_f = filemtime($absolutePath);
        if (isset($_SESSION['moves'][$fileName])) {
          echo '<p data-change style="opacity: 0.2">' . date("D d M Y", $fecha_f) . '</p>';
        } else {
          echo '<p data-change>' . date("D d M Y", $fecha_f) . '</p>';
        }
        ?>
      </td>
      <?php
    } else {
      ?>
      <td></td>
      <?php
    }

    if ($options) {
      ?>
      <td class="p-3" data-file="<?php echo $fileName ?>" data-type="<?php echo $isFolder ? 'dir' : 'file' ?>">

        <!-- RENAME -->
        <button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#renameModal"
          onclick="renameFileModal(event);" id="renameFunction" <?php
          if (isMoveActive())
            echo 'style="visibility:hidden"';
          else
            echo 'style="visibility:visible"'
              ?>>
            <i class="bi bi-pencil text-white" data-change></i>
          </button>

          <!-- COPY -->
          <?php
          if (isset($_SESSION['copies'][$fileName])) {
            ?>
          <form onsubmit="copyFile(event);" id="copyFunction">
            <button type="submit" class="border border-0 bg-transparent" disabled style="cursor:inherit">
              <i class="bi bi-clipboard text-primary" id="copyIcon" data-change></i>
            </button>
          </form>
          <?php
          } else if (isMoveActive()) {
            if (count($_SESSION['copies']) > 0 || count($_SESSION['moves']) > 0) {
              ?>
              <form onsubmit="copyFile(event);" id="copyFunction" style="visibility:hidden">
                <button type="submit" class="border border-0 bg-transparent">
                  <i class="bi bi-clipboard text-white" id="copyIcon" data-change></i>
                </button>
              </form>
            <?php
            }
          } else {
            ?>
            <form onsubmit="copyFile(event);" id="copyFunction" style="visibility:visible">
              <button type="submit" class="border border-0 bg-transparent">
                <i class="bi bi-clipboard text-white" id="copyIcon" data-change></i>
              </button>
            </form>
          <?php
          }

          // MOVE
          if (isset($_SESSION['moves'][$fileName])) {
            ?>
          <form onsubmit="moveFile(event)" id="moveFunction">
            <button type="submit" class="border border-0 bg-transparent" disabled>
              <i class="bi bi-scissors text-white" id="moveIcon" style="cursor: inherit; opacity: 0.2;" data-change></i>
            </button>
          </form>
          <?php
          } else if (isMoveActive()) {
            if (count($_SESSION['copies']) > 0 || count($_SESSION['moves']) > 0) {
              ?>
              <form onsubmit="moveFile(event)" id="moveFunction" style="visibility: hidden">
                <button type="submit" class="border border-0 bg-transparent">
                  <i class="bi bi-scissors text-white" id="moveIcon" data-change></i>
                </button>
              </form>
            <?php
            }
          } else {
            ?>
            <form onsubmit="moveFile(event)" id="moveFunction" style="visibility: visible">
              <button type="submit" class="border border-0 bg-transparent">
                <i class="bi bi-scissors text-white" id="moveIcon" data-change></i>
              </button>
            </form>
          <?php
          }

          //UNZIP
          $filetmp = (explode('.', $fileName));
          $fileExtension = strtolower(end($filetmp));
          if ($fileExtension === 'zip' || $fileExtension === 'rar') {
            ?>
          <form action="unzip.php" method="POST" class="me-2" <?php
          if ($_SESSION['moves'] || $_SESSION['copies'])
            echo 'style="visibility:hidden"';
          else
            echo 'style="visibility:visible"'
              ?> id="unzipFunction">
              <input name="file" type="hidden" value="<?php echo $fileName ?>">
            <button type="submit" class="border border-0 bg-transparent">
              <i class="bi bi-file-earmark-zip text-white me-2" data-change></i>
            </button>
          </form>
          <?php
          } else { ?>
          <form style="visibility: hidden" class="me-2">
            <button type="submit" class="border border-0 bg-transparent">
              <i class="bi bi-file-earmark-zip text-white me-2" data-change></i>
            </button>
          </form>
          <?php
          }
          ?>
        <!--DELETE -->
        <button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal"
          onclick="deleteFileModal(event);" id="deleteFunction" <?php
          if (isMoveActive())
            echo 'style="visibility:hidden"';
          else
            echo 'style="visibility:visible"'
              ?>>
            <i class="bi bi-x-lg text-white" data-change></i>
          </button>
        </td>
      <?php
    } else {
      ?>
      <td class="p-3">
        <!-- SALVAR -->
        <button type="button" data-file="<?php echo $fileName ?>" class="border border-0 bg-transparent"
          onclick="recover_file(event);">
          <i class="bi bi-capsule-pill text-white"></i>
        </button>
      </td>
      <?php
    }
    ?>
  </tr>
  <?php
}

function paintBackRow()
{
  $parent = getParent()
    ?>
  <tr>
    <td class="p-3">
      <a class="folder-btn link text-white fw-bold" href="?p=<?php echo $parent ?>">
        <i class="bi bi-arrow-90deg-left me-3"></i>
        . .
      </a>
    </td>
    <td class="p-3"></td>
    <td class="p-3"></td>
    <td class="p-3"></td>
  </tr>
  <?php
}

function getParent()
{
  $path = $_REQUEST['p'];
  $str_arr = explode("/", $path);
  array_pop($str_arr);
  $string = implode("/", $str_arr);
  return $string;
}

function getTypeIcon($type, $fileName)
{
  if ($type == 'file') {
    $fileExtensionsKnown = ['jpg', 'png', 'txt', 'docx', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4'];
    $filetmp = (explode('.', $fileName));
    $fileExtension = strtolower(end($filetmp));

    if (!in_array($fileExtension, $fileExtensionsKnown)) {
      drawIcon("other");
    } else
      drawIcon($fileExtension);
  } else if ($type == 'dir') {
    drawIcon("dir");
  }
}

function drawIcon($fileExtension)
{
  echo "<img src='./assets/$fileExtension.png' class='icon me-2' alt='$fileExtension' data-change/>";
}

function updateNavigationBreadcrum($dirName)
{
  ?>
  <script>
    const breadcrumb = document.querySelector('#breadcrumb');

    const li = document.createElement('li');
    li.classList.add('breadcrumb-item');
    li.setAttribute('aria-current', 'page');

    const a = document.createElement('a');
    a.classList.add('link');
    a.classList.add('text-white');
    a.href = '?b=<?php echo $dirName ?>';
    a.textContent = '<?php echo $dirName ?>';

    li.append(a);
    breadcrumb.append(li);
  </script>
  <?php
}

function isMoveActive()
{
  if (count($_SESSION['moves']) > 0 || count($_SESSION['copies']) > 0)
    return true;
  return false;
}
?>