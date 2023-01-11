<?php
define("ROOT", "./root");

function loadFiles($parent, $path)
{
  $files = array_diff(scandir($path), array('.', '..'));
  if (substr_count($path, "/") > 1) {
    paintBackDir($parent);
  }
  foreach ($files as $file) {
    paintFile($path, $file);
  }
};

function paintFile($path, $file)
{
  $absolutePath = $path . '/' . $file;

  if (is_dir($path . "/" . $file)) { // Si es una carpeta

    if (isset($_REQUEST['p'])) { // En navegacion entre carpetas

      $relativePath = $_REQUEST['p'] . '/' . $file;
      createFileRow($absolutePath, $relativePath, $file, true, false);
    } else { // Primera apertura sin navegación

      createFileRow($absolutePath, null, $file, true, true);
    }
  } else { // Si es un archivo

    createFileRow($absolutePath, null, $file, false, false);
  }
};

function createFileRow($absolutePath, $relativePath, $fileName, $isFolder, $isRoot)
{
?> <tr>
    <td>
      <?php
      echo getTypeIcon(filetype($absolutePath), $fileName);
      if ($isFolder) {
        if ($isRoot) {
      ?>
          <a class="folder-btn link" href="?p=<?php echo $fileName ?>"><?php echo $fileName ?></a>
    </td>
  <?php
        } else {
  ?>
    <a class="folder-btn link" href="?p=<?php echo $relativePath ?>"><?php echo $fileName ?></a>
    </td>
  <?php
        }
      } else {
  ?>
  <a class="link" href=<?php echo "openFile.php?name=$fileName" ?>><?php echo $fileName ?></a>
  </td>
<?php
      }
      date_default_timezone_set('Europe/Madrid');
?>
<td><?php echo formatBytes(filesize($absolutePath)) ?></td>
<td>
  <?php $fecha_f = filemtime($absolutePath);
  echo date("D d M Y", $fecha_f) ?>
</td>
<td>
  <form action="deleteFile.php">
    <button type="submit" class="border border-0 bg-transparent">
      <i class="bi bi-trash"></i>
    </button>
  </form>
  <?php
  $filetmp = (explode('.', $fileName));
  $fileExtension = strtolower(end($filetmp));
  if ($fileExtension === 'zip' || $fileExtension === 'rar') {
  ?>
    <form action="unzipFile.php" method="POST">
      <input name="file" type="hidden" value="<?php echo $fileName ?>">
      <button type="submit" class="border border-0 bg-transparent">
        <i class="bi bi-file-zip"></i>
      </button>
    </form>
  <?php
  }
  ?>
</td>
  </tr>
<?php
}

function paintBackDir()
{
  $parent = getParent()
?>
  <tr>
    <td>
      <a class="folder-btn link text-primary fw-bold" href="?p=<?php echo $parent ?>">
        <i class="bi bi-arrow-90deg-left"></i>
        . .
      </a>
    </td>
    <td></td>
    <td></td>
    <td></td>
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

function formatBytes($size, $precision = 2)
{
  if ($size > 0) {
    $base = log($size, 1024);
    $suffixes = array('b', 'kb', 'mb', 'gb', 'tb');
    return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
  } else return '';
}

function getTypeIcon($type, $fileName)
{
  if ($type == 'file') {
    $fileExtensionsKnown = ['jpg', 'png', 'txt', 'docx', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4'];
    $filetmp = (explode('.', $fileName));
    $fileExtension = strtolower(end($filetmp));

    if (!in_array($fileExtension, $fileExtensionsKnown)) {
      drawIcon("other");
    } else drawIcon($fileExtension);
  } else if ($type == 'dir') {
    drawIcon("dir");
  }
}

function drawIcon($fileExtension)
{
  echo "<img src='./assets/$fileExtension.png' class='icon me-2' alt='$fileExtension' />";
}
?>