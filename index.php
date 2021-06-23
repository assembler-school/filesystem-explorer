<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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
                    <span>+</span>
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
</body>
</html>