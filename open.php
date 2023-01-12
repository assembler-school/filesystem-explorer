<?php
session_start();
define("ROOT", "./root");
require_once('./utils.php');

$fileName = $_REQUEST['name'];
$relativePath = $_SESSION['relativePath'];
$absolutePath = $_SESSION['absolutePath'];
$GLOBALS['fileExtensionsAllowed'] = ['jpg', 'png', 'txt', 'docx', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4'];

include('./header.php');
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
  <?php include('./footer.php') ?>
  <?php


  function openFile($path, $fileName)
  {
    $fileExtension = Utils::getFileExtension($fileName);
    ?>
    <div></div>
    <p class="p"><strong>File "<?php echo $fileName ?>"</strong></p>
    <p class="p"><strong>Path: </strong>
      <?php echo Utils::getAbsolutePath($path) ?>
    </p>
    <p class="p"><strong>Size: </strong> <?php echo Utils::formatSize(filesize($path)) ?></p>
    <p class="p"><strong>MIME-Type: </strong>
      <?php echo mime_content_type($path) ?>
    </p>
    <p class="p"><strong>Charset: </strong> <?php echo strtolower(mb_detect_encoding($path, ['UTF-8'], false)); ?></p>
    <div class="mb-3">
      <a class="link text-primary fw-bold ms-5 me-3" href="<?php echo $path ?>" download="<?php echo $fileName ?>">
        <i class="bi bi-cloud-arrow-down"></i>
        Download
      </a>
      <?php
      switch ($fileExtension) {
        case 'txt':
        case 'jpg':
        case 'svg':
        case 'png':
        case 'mp3':
        case 'mp4':
          ?>
          <a class="link text-primary fw-bold me-3" target="_blank" href="<?php echo $path ?>">
            <i class="bi bi-door-open"></i>
            Open
          </a>
          <?php
          break;
      }
      ?>
      <a class="link text-primary fw-bold" href="index.php?p=<?php echo $_SESSION['relativePath'] ?>">
        <i class="bi bi-arrow-90deg-left"></i>
        Back
      </a>
    </div>

    <?php
    switch ($fileExtension) {
      case 'docx':
        ?>
        <pre class="pre">
                  <code class="code">
              <?php
              echo Utils::formatDocx($path);
              ?>
                  </code>
                </pre>
        <?php
        break;
      case "rar":
        ?>
        <pre class="pre">
                  <code class="code">
              <?php
              $archive = RarArchive::open($path);
              $entries = $archive->getEntries();
              foreach ($entries as $entry) {
                $entry = str_replace('RarEntry for file "', "File: ", $entry);
                echo "<p>" . $entry . "</p><br>";
              }
              $archive->close();
              ?>
                  </code>
                </pre>
        <?php
        break;
      case "zip":
        ?>
        <pre class="pre">
                <code class="code">
              <?php
              $zip = new ZipArchive;
              if ($zip->open($path) === true) {
                for ($i = 0; $i < $zip->numFiles; $i++) {
                  $filename = $zip->getNameIndex($i);
                  echo "<p>" . $filename . "</p><br>";
                }
                $zip->close();
              }
              ?>
                </code>
              </pre>
        <?php
        break;
      case "jpg":
      case "png":
      case "svg":
        ?>
        <img src="<?php echo $path ?>" alt="<?php echo $fileName ?>">
        <?php
        break;
      case "mp3":
        ?>
        <audio controls autoplay>
          <source src="<?php echo $path ?>" type="audio/mpeg">
        </audio>
        <?php
        break;
      case "mp4":
        ?>
        <video controls autoplay>
          <source src="<?php echo $path ?>" type="video/mp4">
        </video>
        <?php
        break;
      case "txt":
      case "html":
        ?>
          <pre class="pre">
            <code class="code">
        <?php
        $fileStream = fopen($path, 'r') or die("Unable to open file.");
        echo "<p>" . Utils::formatHtml(fread($fileStream, filesize($path))) . "</p>";
        ?>
            </code>
          </pre>
        <?php
        break;
      case "csv":
        ?>
          <pre class="pre">
            <code class="code">
        <?php
        Utils::formatCsv($path);
        ?>
            </code>
          </pre>
        <?php
        break;
      case "ppt":
      case "odt":
      case "exe":
        break;
      case "pdf":
        ?>
          <pre class="pre">
            <code class="code">
        <?php
        Utils::formatPdf($path);
        ?>
            </code>
          </pre>
        <?php
    }
    ?>
    </code>
    </pre>
    <?php
  }