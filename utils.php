<?php
require_once "./pdf.php";
class Utils
{

  public static function getAbsolutePath($path)
  {
    function strpos_last($haystack, $needle)
    {
      $offset = 0;
      $allpos = array();
      while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
        $offset = $pos + 1;
        $allpos[] = $pos;
      }
      return $allpos[count($allpos) - 1];
    }
    $position = strpos_last($path, ".");
    $path = str_replace('.', '', $path);
    $path = str_replace('/', '\\', $path);
    $path = substr_replace($path, '.', $position - 1, 0);
    return __DIR__ . $path;
  }

  public static function getFileExtension($fileName)
  {
    $filetmp = (explode('.', $fileName));
    $fileExtension = strtolower(end($filetmp));
    return $fileExtension;
  }

  public static function formatSize($size, $precision = 2)
  {
    if ($size > 0) {
      $base = log($size, 1024);
      $suffixes = array('bytes', 'kb', 'mb', 'gb', 'tb');
      return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    } else
      return 0;
  }

  public static function formatHtml($data)
  {
    $data = ltrim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Deprecated
  public static function formatDocx($fileName)
  {
    $striped_content = '';
    $content = '';
    if (!$fileName || !file_exists($fileName))
      return false;
    $zip = zip_open($fileName);
    if (!$zip || is_numeric($zip))
      return false;
    while ($zip_entry = zip_read($zip)) {
      if (zip_entry_open($zip, $zip_entry) == FALSE)
        continue;
      if (zip_entry_name($zip_entry) != "word/document.xml")
        continue;
      $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
      zip_entry_close($zip_entry);
    }
    zip_close($zip);
    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);
    return $striped_content;
  }

  public static function formatPdf($file)
  {
    $a = new PDF2Text();
    $a->setFilename($file);
    $a->decodePDF();
    echo $a->output();
  }

  public static function formatCsv($file)
  {
    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c = 0; $c < $num; $c++) {
          echo "<p>" . $data[$c] . "</p>";
        }
      }
      fclose($handle);
    }
  }

  public static function formatRar($file, $pathToExtract)
  {
    $archive = RarArchive::open($file);
    $entries = $archive->getEntries();
    foreach ($entries as $entry) {
      $entry->extract($pathToExtract);
    }
    $archive->close();
  }

  public static function formatZip($file, $pathToExtract)
  {
    $zip = new ZipArchive;
    if ($zip->open($file) === TRUE) {
      $zip->extractTo($pathToExtract);
      $zip->close();
    } else {
      echo 'failed to unzip file';
    }
  }
}