<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wisus Drive</title>
        <script src="js/script.js" defer></script>
        <link rel="stylesheet" href="./css/style.css" type="text/css">
    </head>
    <body>
        <header>
            <nav id="navBar">
                <img id="companyLogo" src="images/logo.png" alt="company logo">
                <img id="userLogo" src="images/encarnita.jpg" alt="user image">
            </nav>
        </header>
        <main>
            <div id="mainContainer">
                <div class="main-children">
                    <input type="text" id="searchInput" placeholder="Search">
                    <div id="buttonsOptionsContainer">
                        <img id="addFolderImage" class="buttons-options" src="images/addFolder.png" alt="create folder icon">
                        <div class="buttons-options">.</div>
                        <div class="buttons-options">.</div>
                        <div class="buttons-options">.</div>
                    </div>
                    <div id="filesExplorerContainer">
                        <div id="filesPath">
                            <ul id="filesList"><?php require_once "./modules/printFiles.php"?></ul>
                        </div>
                        <div id="mediaFolderContainer">
                            <button class="media-folder-buttons">images</button>
                            <button class="media-folder-buttons">videos</button>
                            <button class="media-folder-buttons">audios</button>
                            <button class="media-folder-buttons">documents</button>
                            <button id="folderTrash">trash</button>
                        </div>
                    </div>
                    <div id="informationFilesContainer">
                        <ul id="informationFilesList">
                            <li class="information-files">Created: </li>
                            <li class="information-files">Last modified: </li>
                            <li class="information-files">Extension: </li>
                            <li class="information-files">Size</li>
                            <li class="information-files">Path: </li>
                        </ul>
                    </div>
                </div>
                <div id="secondChildrenContainer" class="main-children">
                    <div id="secondChildrenChild">
                        <div id="titleSecondChild">
                            <p class="titleSecond">Name</p>
                            <p class="titleSecond">Size</p>
                            <p class="titleSecond">Modified</p>
                        </div>
                        <div id="pathSecondChild">
                            <img id="arrowLeft" src="images/arrowLeft.png" alt="left arrow">
                            <img id="folderIcon" src="images/folderIconSmall.png" alt="folder icon">
                            <p id="pathSecond">Directorio de la muerte</p>
                        </div>
                        <div id="contentSecondChild">
                            <div id="folderFilesContainer"></div>
                            <p>30mb</p>
                            <p>Dic 32 26:65</p>
                        </div>
                    </div>
                </div>
                <div class="main-children">
                    <p id="previewText">preview</p>
                </div>
            </div>
        </main>
        <footer></footer>
    </body>
</html>