<?php

session_start();
$completePath = $_SESSION['currentPath'];

$currentPath = substr($completePath, strpos($completePath, "root"));

if (isset($_GET['n'])) {
  $currentElement = $currentPath . "/" . $_GET['n'];
  $videoExt = array("mp4", "avi", "mov", "wmv", "flv", "mkv", "webm");
  $audioExt = array("mp3", "aac", "ogg", "wav", "flac", "alac", "aiff");

  function video($currentVideo)
  {
    echo "<video width='854' height='480' controls>
        <source src='" . $currentVideo . "'>";
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

  function object($currentObject)
  {
    echo "<object width='854' height='480' controls data='" . $currentObject . "'>";
    echo "type='video/mp4'>
      </object>";
  }

  if (isset(pathinfo($currentElement)['extension'])) {
    $ext = pathinfo($currentElement)['extension'];
    if (in_array($ext, $videoExt)) {
      video($currentElement);
    } elseif (in_array($ext, $audioExt)) {
      audio($currentElement);
    } else {
      object($currentElement);
    }
  } else {
    object($currentElement);
  }
}
