<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wisus Drive</title>
        <script src="js/script.js?v=<?php echo time(); ?>" defer></script>
        <script src="js/uploadFile.js?v=<?php echo time(); ?>" defer></script>
        <script src="js/selectElement.js?v=<?php echo time(); ?>" defer></script>
        <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>" type="text/css">
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
                        <img id="addFolderImage" class="buttons-options" title="Create a new folder" src="images/addFolder.png" alt="create folder icon">
                        <img id="uploadFile" class="buttons-options" title="Upload a file" src="images/upload.png" alt="upload file icon">
                        <img id="deleteFile" class="buttons-options" title="Delete a file" src="images/deleteIcon.png" alt="delete file icon">
                        <img id="renameFile" class="buttons-options" title="Rename a folder or file" src="images/renameIcon.png" alt="rename file icon">
                    </div>
                    <div id="filesExplorerContainer">
                        <div id="filesPath">
                            <ul id="filesList"><?php require_once "./modules/printFilesFirstChild.php"?></ul>
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
                            <li id="creationInfo" class="information-files">Creation date: </li>
                            <li id="modifiedInfo" class="information-files">Last modificaton: </li>
                            <li id="extensioinInfo" class="information-files">Extension: </li>
                            <li id="sizeInfo" class="information-files">Size:</li>
                            <li id="pathInfo" class="information-files">Path: </li>
                        </ul>
                    </div>
                </div>
                <div id="secondChildrenContainer" class="main-children">
                    <div id="secondChildrenChild">
                        <div id="pathSecondChild">
                            <img id="arrowLeft" src="images/arrowLeft.png" alt="left arrow">
                            <img id="folderIcon" src="images/folderIconSmall.png" alt="folder icon">
                            <p id="pathSecondFolderTitle"></p>
                        </div>
                        <div id="titleSecondChild">
                            <p class="titleSecond">Name</p>
                            <p class="titleSecond">Size</p>
                            <p class="titleSecond">Modified</p>
                        </div>
                        <div id="contentSecondChild">
                            <div id="folderFilesContainer">
                                <div id="filesListSecondChild"></div>
                            </div>
                            <div id="sizeFilesContainer">
                                <div id="sizeListSecondChild"></div>
                            </div>
                            <div id="modificationFilesContainer">
                                <div id="modificationListSecondChild"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-children">
                    <p id="previewText">preview</p>
                </div>
            </div>
            <form id="formUploadFile" action="modules/uploadFiles.php" method="POST" enctype="multipart/form-data">
                    <input id="inputUploadFile" onchange="this.form.submit()" type='file' name='file'>
            </form>
        </main>
        <footer></footer>
    </body>
</html>