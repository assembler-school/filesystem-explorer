<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
</head>

<body>
  <header>
    <input id="search-bar" type="text">
    <div id="printer"></div>
  </header>
  <main>
    <aside class="folder-tree-container">
      <ul>
        <pre>
        <?php
        include "fileControll/scanDir.php";
        ?>
        </pre>
      </ul>
    </aside>
    <div class=" main-content">
      <ul class=" main-content-ul">
      </ul>
    </div>
    <!-- info-container-anim -->
    <aside class="file-info-container info-container-anim file-info">
    </aside>

    <!-- CONTEXT MENU -->
    <div class="context-menu">
      <div class="container">
        <div class="rightClick showing">
          <div class="buttons">
            <button class="but edit">&#x270E;</button>
            <button class="but fav">&#x2764;</button>
            <button class="but help">&#x2753;</button>
          </div>
          <div class="overlap">&#x2190;</div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
<script src="main.js"></script>
<script src="contextMenu/contextMenu.js"></script>