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
    <div class="search-bar"> </div>
    <div class="header-test"></div>
    <div class="actions">
      <button id="create-folder" class="circle-icon create-folder">+</button>
    </div>
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
            <button class="but new"><img id="create-folder" src="img/addFolder.svg" class="context-menu-icon" /></button>
            <button class="but edit"><img id="edit-folder" src="img/editFolder.svg" class="context-menu-icon" /></button>
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


<template id="create-folder-modal">
  <div class="modal-background"></div>
  <div class="create-folder-modal">
    <h2>CREATE NEW FOLDER</h2>
    <h4>LOCATION</h4>
    <p id="session-path"></p>
    <form type="post" action="fileControll/createFolder.php">
      <input id="create-folder-name" type="text" required />
      <button type="submit" id="create-folder-btn">CREATE NEW FOLDER</button>
    </form>
  </div>
</template>