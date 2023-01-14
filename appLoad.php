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
            ?>
            <a class="folder-btn link text-white" href="?p=<?php echo $fileHref ?>">
              <?php echo $fileName ?>
            </a>
            <?php
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
            ?>
          <a class="folder-btn link text-white" href="?p=<?php echo $fileHrefRelativePath ?>">
            <?php echo $fileName ?>
          </a>
          <?php
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
        if ($options) {
          ?>
        <a class="link text-white" href=<?php echo "open.php?name=$fileHref " ?>>
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
      ?>
    <td class="p-3">
      <?php echo Utils::formatSize(filesize($absolutePath)) ?>
    </td>
    <?php
    if ($options) {
      date_default_timezone_set('Europe/Madrid');
      ?>
      <td class="p-3">
        <?php $fecha_f = filemtime($absolutePath);
        echo date("D d M Y", $fecha_f) ?>
      </td>
      <?php
    } else {
      ?>
      <td></td>
      <?php
    }

    if ($options) {
      ?>
      <td class="p-3">
        <!-- RENAME -->
        <button type="button" data-file="<?php echo $fileName ?>" class="border border-0 bg-transparent"
          data-bs-toggle="modal" data-bs-target="#renameModal" onclick="rename_file(event);">
          <i class="bi bi-pencil text-white"></i>
        </button>

        <!--DELETE -->
        <button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal"
          onclick="type_file(event);" data-file="<?php echo $fileName ?>">
          <i class="bi bi-x-lg text-white"></i>
          </button>

        <!--UNZIP -->
        <?php
        $filetmp = (explode('.', $fileName));
        $fileExtension = strtolower(end($filetmp));
        if ($fileExtension === 'zip' || $fileExtension === 'rar') {
          ?>
          <form action="unzip.php" method="POST" class="me-2">
            <input name="file" type="hidden" value="<?php echo $fileName ?>">
            <button type="submit" class="border border-0 bg-transparent">
              <i class="bi bi-file-earmark-zip text-white"></i>
            </button>
          </form>
          <?php
        }
        ?>
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
  echo "<img src='./assets/$fileExtension.png' class='icon me-2' alt='$fileExtension' />";
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
?>