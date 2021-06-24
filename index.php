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
    <main>
        <section class="mainLeft">
            <div class="newFile"> 
                <div class ="newFile__btn"> 
                    <span id="addNew">+</span>
                </div>
                <div id="newOptionsPanel" class="newOptions">
                    <div id="newFolder" class="optionWrapper"> 
                        <div class="optionIconWrapper">
                            <i class="bi bi-folder-plus"></i>
                        </div>
                        <span>Create Folder</span>
                    </div>
                    <hr>
                    <div id="uploadFolder" class="optionWrapper">
                        <div class="optionIconWrapper">
                            <i class="bi bi-upload"></i>
                        </div>
                            <span>Upload Folder</span></div>
                    <div id="uploadFile" class="optionWrapper"> 
                        <form action="./includes/upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file">
                            <button class="btn" type="submit" name="submit">
                                <div class="optionIconWrapper">
                                    <i class="bi bi-upload"></i>
                                </div>
                                <span>Upload File</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="fdContainer">
                <div class="root"><i class="bi bi-folder"></i> File </div>
                <div class="prueba"> <i class="bi bi-folder"></i>Directory </div>
            </div>
        </section>
        <section class="mainCenter">
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
    <!-- <script type="text/javascript" src="/node_modules/jquery/dist/jquery.js"></script> -->
    <script type="text/javascript" src="./js/render.js"></script>
</body>
</html>