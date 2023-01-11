<?php
session_start();
define("ROOT", "./root");
require_once('./htmlTags.php');

$fileName = $_REQUEST['name'];
$relativePath = $_SESSION['relativePath'];
$absolutePath = $_SESSION['absolutePath'];

getHeader();
?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <h4 class="text-white m-0 ms-4">File Explorer</h4>
      <form class="navbar-brand m-0 ms-3 me-3 text-white" action="index.php" method="POST">
        <input type="hidden" name="path" value=<?php echo ROOT ?>>
        <button type="submit" class="home-btn folder-btn"><i class="bi bi-house"></i></button>
      </form>
    </nav>
  </header>

  <article class="container-fluid mt-3">
    <?php openFile($absolutePath . '/' . $fileName, $fileName); ?>
  </article>
  <?php getFooter(); ?>
  <?php

  function openFile($path, $fileName)
  {
    $filetmp = (explode('.', $fileName));
    $fileExtension = strtolower(end($filetmp));
    $newPath = str_replace('.', '', $path);
    $lastPath = str_replace('/', '\\', $newPath);
    $len = strlen($lastPath);
    $finalPath = substr_replace($lastPath, '.', $len - 3, 0);
  ?>
    <div></div>
    <p class="p"><strong>File "<?php echo $fileName ?>"</strong></p>
    <p class="p"><strong>Path: </strong> <?php echo __DIR__ . $finalPath ?></p>
    <p class="p"><strong>Size: </strong> <?php echo formatBytes(filesize($path)) ?></p>
    <p class="p"><strong>MIME-Type: </strong> <?php echo mime_content_type($path) ?></p>
    <p class="p"><strong>Charset: </strong> <?php echo strtolower(mb_detect_encoding($path, ['UTF-8'], false)); ?></p>
    <div class="mb-3">
      <a class="link text-primary fw-bold ms-5 me-3" href="<?php echo $path ?>" download="<?php echo $fileName ?>">
        <i class="bi bi-cloud-arrow-down"></i>
        Download
      </a>
      <a class="link text-primary fw-bold me-3" target="_blank" href="<?php echo $path ?>">
        <i class="bi bi-door-open"></i>
        Open
      </a>
      <a class="link text-primary fw-bold" href="index.php?p=<?php echo $_SESSION['relativePath'] ?>">
        <i class="bi bi-arrow-90deg-left"></i>
        Back
      </a>
    </div>
    <pre class="pre">
      <code class="code">
    <?php
    switch ($fileExtension) {

      case 'docx':
        echo read_file_docx($path);
        break;
      case "rar":
        $archive = RarArchive::open($path);
        $entries = $archive->getEntries();
        foreach ($entries as $entry) {
          $entry = str_replace('RarEntry for file "', "File: ", $entry);
          echo "<p>" . $entry . "</p><br>";
          //$entry->extract($_SESSION['absolutePath']);
        }
        $archive->close();
        break;
      case "zip":
        $zip = new ZipArchive;
        if ($zip->open($path) === true) {
          for ($i = 0; $i < $zip->numFiles; $i++) {
            $filename = $zip->getNameIndex($i);
          echo "<p>" . $filename . "</p><br>";            //$fileinfo = pathinfo($filename);
            //copy("zip://" . $path . "#" . $filename, "/your/new/destination/" . $fileinfo['basename']);
          }
          $zip->close();
        }
        break;
      case "jpg":
      case "png":
    ?> <img src="<?php echo $path ?>" alt="<?php echo $fileName ?>">
      <?php
        break;
      case "mp3":
      ?> <audio controls autoplay>
          <source src="<?php echo $path ?>" type="audio/mpeg">
        </audio>
  <?php
        break;
      case "mp4":
  ?> <video width="320" height="240" controls autoplay>
  <source src="<?php $path ?>" type="video/mp4">
</video>
  <?php
        break;
      case "txt":
      case "html":
        $fileStream = fopen($path, 'r') or die("Unable to open file.");
        echo "<p>" . clean(fread($fileStream, filesize($path))) . "</p>";
        break;
      default:
        break;
    }
  ?>
          </code>
    </pre>
  <?php
  }

  function formatBytes($size, $precision = 2)
  {
    if ($size > 0) {
      $base = log($size, 1024);
      $suffixes = array('bytes', 'kb', 'mb', 'gb', 'tb');
      return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    } else return 0;
  }

  function clean($data)
  {
    $data = ltrim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function read_file_docx($filename)
  {

    $striped_content = '';
    $content = '';

    if (!$filename || !file_exists($filename)) return false;

    $zip = zip_open($filename);

    if (!$zip || is_numeric($zip)) return false;

    while ($zip_entry = zip_read($zip)) {

      if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

      if (zip_entry_name($zip_entry) != "word/document.xml") continue;

      $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

      zip_entry_close($zip_entry);
    } // end while

    zip_close($zip);

    //echo $content;
    //echo "<hr>";
    //file_put_contents('1.xml', $content);

    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);

    return $striped_content;
  }
  $filename = "filepath"; // or /var/www/html/file.docx

  $content = read_file_docx($filename);
  if ($content !== false) {

    echo nl2br($content);
  } else {
    echo 'Couldn\'t the file. Please check that file.';
  }
