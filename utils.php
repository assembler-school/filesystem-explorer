<?php

require_once('./pdf.php');

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
    return pathinfo($fileName, PATHINFO_EXTENSION);
  }

  public static function getNameFile($path)
  {
    $array = explode('/', $path);
    return array_pop($array);
  }

  public static function formatSize($size, $precision = 2)
  {
    if ($size > 0) {
      $base = log($size, 1024);
      $suffixes = array('bytes', 'kb', 'mb', 'gb', 'tb');
      return round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    } else
      return '';
  }

  public static function getBreadcrumb($path)
  {
    return explode('/', $path);
  }

  public static function formatHtml($data)
  {
    $data = ltrim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

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

  public static function formatRar($file, $pathToExtract, $fileName)
  {
    $archive = RarArchive::open($file);
    $entries = $archive->getEntries();
    if (!mkdir($pathToExtract . '/' . explode('.', $fileName)[0]))
      return false;
    foreach ($entries as $entry) {
      $entry->extract($pathToExtract . '/' . explode('.', $fileName)[0]);
    }
    $archive->close();
    return true;
  }

  public static function formatZip($file, $pathToExtract, $fileName)
  {
    $zip = new ZipArchive;
    if ($zip->open($file) === TRUE) {
      if (!mkdir($pathToExtract . '/' . explode('.', $fileName)[0]))
        return false;
      $zip->extractTo($pathToExtract . '/' . explode('.', $fileName)[0]);
      $zip->close();
    } else {
      echo 'failed to unzip file';
    }
    return true;
  }

  public static function moveFiles($old, $new)
  {
    if (file_exists($old) && ((!file_exists($new)) || is_writable($new))) {
      rename($old, rtrim($new, '.'));
    }
  }

  public static function copyFilesRecursively($old, $new)
  {
    echo "Nombre . " . $new . '<br>';
    mkdir(rtrim($new, '.'), 0777);
    foreach ($iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($old, \RecursiveDirectoryIterator::SKIP_DOTS), \RecursiveIteratorIterator::SELF_FIRST) as $item) {
      if ($item->isDir()) {
        mkdir($new . DIRECTORY_SEPARATOR . $iterator->getSubPathname());
      } else {
        copy($item, $new . DIRECTORY_SEPARATOR . $iterator->getSubPathname());
      }
    }
  }

  public static function deleteAll($dir)
  {
    foreach (glob($dir . '/*') as $file) {
      if (is_dir($file))
        self::deleteAll($file);
      else
        unlink($file);
    }
    rmdir($dir);
  }

  public static function getDirContents($dir, &$results = array())
  {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
      $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
      if (!is_dir($path)) {
        $results[] = $path;
      } else if ($value != "." && $value != "..") {
        getDirContents($path, $results);
        $results[] = $path;
      }
    }
    return $results;
  }

  public static function changeFileRoute($newPath, $oldPath)
  {
    $array = explode('/', $oldPath);
    return $newPath . $array[count($array) - 1];
  }

  public static function chooseName($path, $name)
  {
    $actual_name = pathinfo($name, PATHINFO_FILENAME);
    $original_name = $actual_name;
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $array = explode('/', $path);
    array_pop($array);
    $path = implode('/', $array);
    $i = 1;
    while (file_exists($path . '/' . $actual_name . "." . $extension)) {
      $actual_name = (string) $original_name . " ($i)";
      $name = $actual_name . "." . $extension;
      $i++;
    }
    return $name;
  }

  public static function getFilePermissions($file)
  {
    return substr(sprintf('%o', fileperms($file)), -4);
  }

  public static function saveSession($file)
  {
    $sessionfile = fopen($file, "w");
    fputs($sessionfile, session_encode());
    fclose($sessionfile);
  }
}