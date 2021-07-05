<?php

session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = substr($completePath, strpos($completePath, "root"));

if (isset($_GET['n'])) {
  $currentElement = $currentPath . "/" . $_GET['n'];
  $videoExt = array("mp4", "avi", "mov", "wmv", "flv", "mkv", "webm");
  $audioExt = array("mp3", "aac", "ogg", "wav", "flac", "alac", "aiff");
  $objectExt = ['pdf', 'jpg', 'jpeg', 'png', 'txt'];

  function video($currentVideo)
  {
    echo "<video width='854' height='480' controls>";
    echo $currentVideo;
    echo "<source src='" . $currentVideo . "'>";
    echo "type='video/mp4'>
      </video>";
  }

  function audio($currentAudio)
  {
    echo "<audio controls class='align-self-center'>
        <source src='" . $currentAudio . "'>";
    echo "type='video/mp4'>
      </audio>";
  }

  function csvPre($currentCSV)
  {
    $handle = fopen("../" . $currentCSV, 'r');
    echo '<table class="table table-dark table-bordered">';
    echo '<tbody>';
    while ($row = fgetcsv($handle)) {
      echo '<tr>';
      foreach ($row as $value) {
        echo "<td>$value</td>";
      }
      echo '</tr>';
    }
    echo '</tbody></table>';
    fclose($handle);
  }

  function object($currentObject)
  {
    echo "<object width='854' height='480' controls data='" . $currentObject . "'></object>";
  }


  if (isset(pathinfo($currentElement)['extension'])) {
    $ext = pathinfo($currentElement)['extension'];
    if (in_array($ext, $videoExt)) {
      video($currentElement);
    } elseif (in_array($ext, $audioExt)) {
      audio($currentElement);
    } elseif ($ext == "csv") {
      csvPre($currentElement);
    } elseif (in_array($ext, $objectExt)) {
      object($currentElement);
    } else {
      echo "Cannot preview this extension: $ext";
    }
  } else {
    echo "Cannot preview this file, not extension found";
  }
}
