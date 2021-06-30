<?php 
    require("./includes/manageDirItems.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
</head>

<body>
    <!-- --------------Panels section------------------ -->

    <!-- CreateFolderPanel -->
    <div id="createFolderForm" class="createFolderPanel">
        <form action="./includes/createFolder.php" method="POST">
            <div class="createFolderHeader">
                <h4 class="createFolderFormTitle">New folder</h4>
                <i id="closeCreateFolderBtn" class="bi bi-x-lg"></i>
            </div>
            <input class="newFolderInput" type="text" name="folderName" placeholder="Input new folder name">
            <div class="buttons">
                <button type="submit" name="submitFolder" class="createFolderPanelBtn submit"> CREATE</button>
                <button type="button" id="cancelBtnForm" class="createFolderPanelBtn cancel">CANCEL</button>
            </div>
        </form>
    </div>
    <div id="createFolderBackground"></div>

    <!-- NewOptionsPanel -->
    <div id="newOptionsPanel" class="newOptions">
        <div id="newFolder" class="optionWrapper"> 
            <button id ="createFolder" class="panelBtn" type="button">
                <div class="optionIconWrapper">
                    <i class="bi bi-folder-plus"></i>
                </div>
                <span>Create Folder</span>
            </button>
        </div>
        <hr>
        <div id="uploadFolder" class="optionWrapper">
            <div class="optionIconWrapper">
                <i class="bi bi-upload"></i>
            </div>
                <span>Upload Folder</span>
        </div>
        <div id="uploadFile" class="optionWrapper"> 
            <form action="./includes/uploadFile.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button class="panelBtn" type="submit" name="submit">
                    <div class="optionIconWrapper">
                        <i class="bi bi-upload"></i>
                    </div>
                    <span>Upload File</span>
                </button>
            </form>
        </div>
    </div>
    <div id ="newOptionsPanelBackground"></div>

    <!-- FileDirOptionsPanel  -->
    <div id="fileDirOptionsPanel" class="fileDirOptions">
        <div id="rename" class="optionWrapper"> 
            <button id ="renameBtn" class="panelBtn" type="button">
                <div class="optionIconWrapper">
                    <i class="bi bi-pencil-square"></i>
                </div>
                <span>Rename</span>
            </button>
        </div>
        <div id="delete" class="optionWrapper"> 
            <button id ="deleteBtn" class="panelBtn" type="button">
                <div class="optionIconWrapper">
                    <i class="bi bi-trash-fill"></i>
                </div>
                <span>Delete</span>
            </button>
        </div>
        <div id="open" class="optionWrapper"> 
            <button id ="openBtn" class="panelBtn" type="button">
                <div class="optionIconWrapper">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <span>Open</span>
            </button>
        </div>
    </div>

    <!-- Rename file or folder form  -->
    <div id="renamerForm" class="createFolderPanel">
        <form name="renameForm" action="./includes/updateName.php" onsubmit="return renameValidation()" method="POST">
            <div class="createFolderHeader">
                <h4 class="createFolderFormTitle">Choose new name</h4>
                <i id="closeRenameFolderBtn" class="bi bi-x-lg"></i>
            </div>
            <label for="oldName">Current Name</label>
            <input id="oldName" class="newFolderInput" type="text" name="oldName" value="" readonly>
            <label for="newName">New Name</label>
            <input id="newName" class="newFolderInput" type="text" name="newName" placeholder="Input new name" required>
            <div class="buttons">
                <button type="submit" name="submitRename" class="createFolderPanelBtn submit">SUBMIT</button>
                <button type="button" id="cancelRenameBtnForm" class="createFolderPanelBtn cancel">CANCEL</button>
            </div>
        </form>
    </div>

    <!-- Header section -->
    <header>
        <div class="headerLeft">
            <img src="./assets/img/logo.png"
     alt="Logo"  />
        </div>
        <div class="headerCenter"> 
            <input class="searchBar" type="text">
        </div>
        <div class="headerRight"> 
            <div class="icon"> 
            <i class="bi bi-gear-fill"></i>
            </div>
            <div class="iconUser"> user </div>
        </div>
    </header>

    <!-- Main section -->
    <main>
        <section class="mainLeft">
            <div class="newFile"> 
                <div class ="newFile__btn"> 
                    <span id="addNew">+</span>
                </div>
            </div>
            <hr>
            <div class="fdContainer">
                
                <?php 
                    renderItemListLeft($dirPath, $dirPathItemList);
                ?>
                                
            </div>
            <hr>
            <div class ='fileWrapperDelete'>
                <a class='renderUpdateLink' href='./includes/manageDirItems.php?updateDir'>
                <i class="bi bi-trash2-fill"></i><div class='mainCenter__fileName'>Delete</div></a>
            </div>
        </section>
        <section class="mainCenter">
            <div class ='fileWrapper'>
                <?php echo "
                    <div class='mainCenter__fileName'> 
                        <a class='renderUpdateLink' href='./index.php'>My Unity</a> 
                    </div>"; ?>
            </div>

            <?php 
                renderDirItemList($dirPath, $dirPathItemList);
            ?>

        </section>
        <section class="mainRight">
            <div class="mainRight__fileHeader">
                <div class="mainRight__fileIcon"><i class="bi bi-folder-fill"></i></div>
                <div class="mainRight__fileName">filename</div>
            </div>
            <hr class="mainRight__hr">
            <div class="fileInfoContainer">
            <div class="fileInfoWrapper">
                    <div class="label"> Name: </div>
                    <div class="labelType">MasterClass Pc</div>
                </div>
                <div class="fileInfoWrapper">
                    <div class="label"> Creation date: </div>
                    <div class="labelType">17/03/2021</div>
                </div>
                <div class="fileInfoWrapper">
                    <div class="label"> Modification date: </div>
                    <div class="labelType">11/05/2021</div>
                </div>
                <div class="fileInfoWrapper">
                    <div class="label"> Size: </div>
                    <div class="labelType">38 KB</div>
                </div>
                <div class="fileInfoWrapper">
                    <div class="label"> Extension: </div>
                    <div class="labelType">.Doc</div>
                </div>
            </div>
        </section>
    </main>
    <template>
    <div class ="fileWrapper">
                <div class="mainCenter__fileIcon"><i class="bi bi-folder-fill"></i></div>
                <div class="mainCenter__fileName">Documents</div>
            </div>
            <div class ="fileWrapper">
                <div class="mainCenter__fileIcon"><i class="bi bi-folder-fill"></i></div>
                <div class="mainCenter__fileName">Audio</div>
            </div>
            <div class ="fileWrapper">
                <div class="mainCenter__fileIcon"><i class="bi bi-folder-fill"></i></div>
                <div class="mainCenter__fileName">Video</div>
            </div>
            <div class ="fileWrapper">
                <div class="mainCenter__fileIcon"><i class="bi bi-folder-fill"></i></div>
                <div class="mainCenter__fileName">Images</div>
            </div>
    </template>
    <!-- <script type="text/javascript" src="/node_modules/jquery/dist/jquery.js"></script> -->
    <script type="text/javascript" src="./js/render.js"></script>
    <script type="text/javascript" src="./js/formValidation.js"></script>
</body>
</html>