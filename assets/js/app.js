const divFolders = document.getElementById('folder');
const btnCreateFolder = document.querySelector("#create-new-folder");
const divFiles = document.getElementById('files');
const btnDeleteFile = document.querySelector("#delete-file");
let btnRelocateFile = document.querySelector("#relocate-file");
let btnOpenTrash = document.querySelector("#trash-folder");
const btnClosePopUp = document.getElementById("close-popup");

// Display Folders Left Side
function getInfoFolders() {
    while (divFolders.firstChild) {
        divFolders.removeChild(divFolders.lastChild);
    }

    while (divFiles.firstChild) {
        divFiles.removeChild(divFiles.lastChild);
    }

    fetch('../assets/display-folders.php')
        .then(response => response.json())
        .then(data => displayFolderIndex(data));
}

function displayFolderIndex(data) {
    foldersArray = data;

    foldersArray.forEach(folder => {
        let elLi = document.createElement('li');

        let elDiv = document.createElement('div');
        let elImgFolder = document.createElement('img');

        let divBtns = document.createElement('div');

        let spanEdit = document.createElement('span');
        let iEdit = document.createElement('i');

        let spanDelete = document.createElement('span');
        let iDelete = document.createElement('i');

        elDiv.className = 'select-folder';
        elDiv.setAttribute('name-folder', folder);
        elDiv.textContent = folder;
        elImgFolder.src = '../image/folder.ico';
        elImgFolder.className = 'imageFolder';
        elImgFolder.alt = 'image Folder';

        spanEdit.className = 'modify-name-folder';
        spanEdit.setAttribute('actual-folder', folder);
        iEdit.className = 'fa-solid fa-pen';

        spanDelete.className = 'delete-folder';
        iDelete.className = 'fa-solid fa-trash';
        iDelete.id = 'delete-folder';
        spanDelete.setAttribute('filePath', folder);

        divFolders.prepend(elLi);

        elLi.appendChild(elDiv);
        elDiv.prepend(elImgFolder);

        elLi.appendChild(divBtns);

        divBtns.appendChild(spanEdit);
        spanEdit.appendChild(iEdit);

        divBtns.appendChild(spanDelete);
        spanDelete.appendChild(iDelete);
    })

    let h1Files = document.createElement('h1');
    h1Files.textContent = 'Welcome! Please choose a folder😁🖼️';
    h1Files.id = 'choose-folder-h1';

    divFiles.prepend(h1Files);

    const modifyNameFolder = document.querySelectorAll(".modify-name-folder");
    const selectFolder = document.querySelectorAll(".select-folder");
    const deleteFolder = document.querySelectorAll(".delete-folder");

    modifyNameFolder.forEach((item) => {
        item.addEventListener("click", modifyNameFolders)
    });


    deleteFolder.forEach((item) => {
        item.addEventListener("click", deleteFolders)
    });

    selectFolder.forEach((item) => {
        item.addEventListener("click", selectFolders)
    });
}

// Option Folders

function createNewFolder(pathNewFolder) {
    let newName = prompt(`Assign a name to the new folder.`);

    if (newName !== 'null' && typeof newName !== 'object') {
        if (typeof pathNewFolder !== 'object') {
            newName = pathNewFolder + "/" + newName;
        }

        fetch("../assets/create-folder.php?nameFolder=" + newName)
            .then(response => response.json(),
                reject => alert('There was an error, we couldnt create the folder!'))
            .then(info => {
                if (info.exists) {
                    alert(info.msg);
                } else {
                    if (typeof pathNewFolder !== 'object') {
                        createFilesTab(pathNewFolder);
                    } else {
                        getInfoFolders();
                    }
                }
            });
    }
}

function modifyNameFolders(event) {
    let actualFolderName = event.currentTarget.getAttribute('actual-folder');
    let newName = prompt(`Put new folder name for "${actualFolderName}", please/`);

    if (newName) {
        fetch("../assets/modify-folder.php?nameFolder=" + newName + "&actualFolderName=" + actualFolderName)
            .then(response => {
                if (response.status === 200) {
                    getInfoFolders();
                } else {
                    alert('There was an error, we couldnt change the name of the folder!');
                }
            })
    }
}

function deleteFolders(event) {
    let actualFolderName = event.currentTarget.getAttribute('filePath');

    let popUpDeleteConfirm;
    if (actualFolderName.includes('Trash/') === true) {
        popUpDeleteConfirm = confirm("This folder will delete permanently, are you sure to delete it?");
    } else {
        popUpDeleteConfirm = confirm(`Do you want delete "${actualFolderName}" folder?`);
    }

    if (popUpDeleteConfirm) {
        if (actualFolderName.includes('Trash/') === true) {
            deleteFolderTrash(actualFolderName);
            createFilesTab('Trash');
        }else if(actualFolderName.includes('/') === true){
            atrBasura = '../root/' + actualFolderName;
            addTrash(atrBasura);
        }else{
            atrBasura = '../root/' + actualFolderName;
            addTrash(atrBasura); 
        }
    }
}

function moveFolders(folderPath) {
    fetch('../assets/display-content.php?actualFolderName=')
        .then(response => response.json())
        .then(data => listFoldersPopUp(data));
}

function listFoldersPopUp(data) {
    hideOptionPopUp('both');

    const divViewContent = document.querySelector('#view-content');
    const filePopUp = document.querySelector('#file-show-popup');

    filePopUp.style.display = 'none';

    let divPopUpMove = document.createElement('div');
    divPopUpMove.className = 'move-btwn-folders';

    let spanMoveTo = document.createElement('h2');
    spanMoveTo.textContent = 'Move To';

    divViewContent.prepend(divPopUpMove);
    divPopUpMove.prepend(spanMoveTo);

    data.forEach(folder => {
        let indexSlashPath = folder.lastIndexOf('/');
        let pathFolderNoSlash = folder.slice(indexSlashPath + 1);

        if (!pathFolderNoSlash.includes('.')) {
            let divFolder = document.createElement('div');
            divFolder.className = 'inside-btwn';

            let spanFolder = document.createElement('span');
            spanFolder.textContent = pathFolderNoSlash;
            spanFolder.id = 'span-folder-move';
            spanFolder.setAttribute('file-path', pathFolderNoSlash)

            divPopUpMove.appendChild(divFolder);
            divFolder.prepend(spanFolder);

            showFolderInsideMove(pathFolderNoSlash, divFolder);

            spanFolder.addEventListener('click', relocateFileTo);
        }
    })
}

function showFolderInsideMove(folderPath, divFolder, i) {
    fetch('../assets/display-content.php?actualFolderName=' + folderPath)
        .then(response => response.json())
        .then(data => {
            data.forEach(folder => {
                let folderNoRoot = folder.slice(8);

                let folderNameSlash = folder.lastIndexOf('/');
                let folderName = folder.slice(folderNameSlash + 1);

                if (!folderNoRoot.includes('.')) {
                    let insideDiv = document.createElement('div');
                    insideDiv.className = 'inside-div-move';

                    let spanInside = document.createElement('span');
                    spanInside.textContent = folderName;
                    spanInside.setAttribute('file-path', folderNoRoot);

                    divFolder.appendChild(insideDiv);
                    insideDiv.appendChild(spanInside);

                    showFolderInsideMove(folderNoRoot, insideDiv);

                    spanInside.addEventListener('click', relocateFileTo);
                }
            });
        });
}

// Display Files of the folder | middle

function selectFolders(event) {
    let openFolder = event.srcElement.getAttribute('name-folder');

    createFilesTab(openFolder);
}

function createFilesTab(folderName) {
    while (divFiles.firstChild) {
        divFiles.removeChild(divFiles.lastChild);
    }

    let bodyTable = document.createElement("table");
    let tableRow = document.createElement("tr");

    divFiles.appendChild(bodyTable);
    bodyTable.appendChild(tableRow);
    bodyTable.id = "tableFolder";

    for (let i = 0; i < 4; i++) {
        let nameHead = "";
        switch (i) {
            case 0:
                nameHead = "File name:";
                break
            case 1:
                nameHead = "Created date:";
                break
            case 2:
                nameHead = "Modified date:";
                break
            case 3:
                nameHead = "Size:";
                break
        }
        tableRow.appendChild(document.createElement("th")).textContent = nameHead;
    }

    createButtonsFile(folderName);

    let btnCreateInsideFolder = document.querySelector('#create-folder-inside')
    let pathCreateNewFolder = btnCreateInsideFolder.getAttribute('folder-path');
    btnCreateInsideFolder.addEventListener('click', () => {
        createNewFolder(pathCreateNewFolder);
    });

    fetch("../assets/display-content.php?actualFolderName=" + folderName)
        .then(response => response.json())
        .then(data => showelementosOfFolder(data))
}

function showelementosOfFolder(data) {
    data.forEach(file => {
        const containerOpenFolder = document.querySelector("#tableFolder");
        let trFile = document.createElement("tr");
        let cutPath = file.lastIndexOf("/");
        let pathFile = file.slice(cutPath + 1);
        containerOpenFolder.appendChild(trFile);
        trFile.className += "elemtoOfFolder";
        trFile.setAttribute("filePath", file);

        fetch("../assets/display-metadata-file.php?filePath=" + file)
            .then(response => response.json())
            .then(data => constructorTable(data, pathFile, trFile))

    })

    let folderElement = document.querySelectorAll(".elemtoOfFolder");
    folderElement.forEach((item) => {
        item.addEventListener("click", showInfoElement)
    });
}

function constructorTable(data, pathFile, trFile) {
    for (let i = 0; i < 4; i++) {
        let size = "";
        if (data.size <= 1024000) {
            let sizeKb = Math.round(data.size / 1024 * 10) / 10;
            size = sizeKb + "Kb";
        } else {
            let sizeMb = Math.round(data.size / 1024000 * 10) / 10;
            size = sizeMb + "MB";
        }

        let infoTd = "";
        switch (i) {
            case 0:
                infoTd = pathFile;

                break

            case 1:
                infoTd = data.modify;
                break
            case 2:
                infoTd = data.creation;
                break
            case 3:
                infoTd = size;
                break;
        }
        let tdRow = document.createElement("td");
        tdRow.textContent = infoTd;


        if (i === 0) {
            let extension = getPathExtension(pathFile);
            let img = document.createElement("img");

            switch (extension) {
                case "mp3":
                    img.src = "../image/mp3.png";
                    break
                case "mp4":
                    img.src = "../image/mp4.png";
                    break
                case "txt":
                    img.src = "../image/txt.png";
                    break
                case "img":
                    img.src = "../image/img2.jpeg";
                    break
            }
            tdRow.prepend(img);
        }
        trFile.appendChild(tdRow);
    }
}

// Get into folder inside a folder

function displayInsideFolder(folderName) {
    let pathFile = folderName;

    if (folderName.includes("../root/")) {
        pathFile = folderName.slice(8);
    }

    createFilesTab(pathFile);

    let indexPreviousFolder = pathFile.lastIndexOf("/");
    let backPath = pathFile.slice(0, indexPreviousFolder);

    const btnFiles = document.querySelector('.buttons-files');
    const btnAddFolder = document.querySelector('#create-folder-inside');

    const backSpan = document.createElement('span');
    backSpan.textContent = '< Go back';
    backSpan.setAttribute('back-path', backPath);
    backSpan.id = 'btn-backpath';

    let btnDeleteInsideFolder = document.createElement('span');
    let iDeleteFolder = document.createElement('i');
    iDeleteFolder.className = 'fa-solid fa-trash';
    btnDeleteInsideFolder.id = 'delete-folder-inside';
    btnDeleteInsideFolder.textContent = 'Delete Folder';
    btnDeleteInsideFolder.setAttribute('filePath', pathFile);

    btnFiles.prepend(backSpan);

    btnAddFolder.insertAdjacentElement('afterend', btnDeleteInsideFolder);
    btnDeleteInsideFolder.prepend(iDeleteFolder);

    backSpan.addEventListener('click', () => {
        if (backPath.lastIndexOf("/") === -1) {
            while (backSpan.firstChild) {
                backSpan.removeChild(backSpan.lastChild);
            }
            while (btnDeleteInsideFolder.firstChild) {
                btnDeleteInsideFolder.removeChild(btnDeleteInsideFolder.lastChild);
            }
            createFilesTab(backPath);
        } else {
            displayInsideFolder(backPath);
        }
    });

    btnDeleteInsideFolder.addEventListener('click', deleteFolders);
}

// Options files

function createButtonsFile(folderPath) {
    const h1Files = document.querySelector('#choose-folder-h1');
    if (h1Files !== null) {
        h1Files.remove();
    }

    let divOptionsFolder = document.createElement('div');
    divOptionsFolder.className = 'buttons-files';

    let btnCreateFile = document.createElement('span');
    let iCreateFile = document.createElement('i');
    iCreateFile.className = 'fa-solid fa-file';
    btnCreateFile.textContent = 'New File';
    btnCreateFile.setAttribute('folder-path', folderPath)

    let btnCreateFolder = document.createElement('span');
    let iCreateFolder = document.createElement('i');
    iCreateFolder.className = 'fa-solid fa-plus';
    btnCreateFolder.id = 'create-folder-inside';
    btnCreateFolder.textContent = 'New Folder';
    btnCreateFolder.setAttribute('folder-path', folderPath);

    let spanNameFolder = document.createElement('span');
    spanNameFolder.id = 'name-folder';
    spanNameFolder.textContent = folderPath;

    divFiles.prepend(divOptionsFolder);

    divOptionsFolder.appendChild(btnCreateFile);
    btnCreateFile.prepend(iCreateFile);

    divOptionsFolder.appendChild(btnCreateFolder);
    btnCreateFolder.prepend(iCreateFolder);

    divOptionsFolder.appendChild(spanNameFolder);

    btnCreateFile.addEventListener('click', createPopUpUpload);
}

// Get info of the files

function getPathExtension(path) {
    let cutExtension = path.lastIndexOf(".");
    let pathExtension = path.slice(cutExtension + 1);
    let formatImg = ["jpg", "png", "webp"];

    if (formatImg.includes(pathExtension)) {
        pathExtension = "img";
    }

    return pathExtension;
}

function showInfoElement(event) {
    let atrituboFile = event.currentTarget.getAttribute("filePath")
    let pathExtension = getPathExtension(atrituboFile);

    switch (pathExtension) {
        case "txt":
            let cutPath = atrituboFile.indexOf("/");
            let pathFile = atrituboFile.slice(cutPath + 1);
            window.location.replace("../text-editor.php?pathFile=" + pathFile);
            break;
        case "img":
            createFileContent("img", atrituboFile);
            break;
        case "mp4":
            createFileContent("mp4", atrituboFile);
            break;
        case "mp3":
            createFileContent("mp3", atrituboFile);
            break;
        default:
            displayInsideFolder(atrituboFile);
            break;
    }

    btnDeleteFile.setAttribute("filePath", atrituboFile)
    btnDeleteFile.addEventListener("click", deleteFile);

    btnRelocateFile.setAttribute("filePath", atrituboFile);
}

// Relocate documento

function relocateFileTo(path) {
    let filePath = btnRelocateFile.getAttribute("filePath");
    let newFilePath = path.currentTarget.getAttribute('file-path');
    let confirmMove = confirm(`Where do you want to move this file to ${newFilePath}?`);

    if (confirmMove) {
        fetch("../assets/relocate-file.php?filepath=" + filePath + "&folderName=" + newFilePath)
            .then(response => response.json())
            .then(data => {
                if (data.code === 200) {
                    document.querySelector('.move-btwn-folders').remove();
                    closePopUp();
                    if (data.redir.match("/")) {
                        displayInsideFolder(data.redir);
                    } else {
                        createFilesTab(data.redir);
                    }
                } else if (data.code === 500) {
                    alert(code.msg);
                }
            });
    }

}

// Move to trash / delete

function deleteFile() {
    let basura = document.querySelector("#delete-file");
    let atrBasura = basura.getAttribute("filePath");

    let popUpDeleteConfirm;
    if (atrBasura.includes('/Trash/') === true) {
        popUpDeleteConfirm = confirm("This file will delete permanently, are you sure to delete it?");
    } else {
        popUpDeleteConfirm = confirm("Do you want delete this file?");
    }

    if (popUpDeleteConfirm) {
        addTrash(atrBasura);
    }
}

function addTrash(atrBasura) {
    if (atrBasura.includes('/Trash/') === true) {
        fetch("../assets/delete-file.php?filePath=" + atrBasura)
            .then(response => {
                if (atrBasura.split('.').length > 3) {
                    closePopUp();
                }
                createFilesTab('Trash');
            });
    } else {
        fetch("../assets/add-trash.php?filePath=" + atrBasura)
            .then(response => {
                if (atrBasura.split('.').length > 3) {
                    closePopUp();
                }
                if(atrBasura.split('/').length === 2){
                    getInfoFolders();
                }else{
                    createFilesTab('Trash');
                }
            });
    }
}

function deleteFolderTrash(atrBasura){
    fetch("../assets/delete-folder.php?filePath=" + atrBasura)
    .then(response => response.json())
}

function openTrashFolder() {
    createFilesTab("Trash");
}

// Pop Up Options

function hideOptionPopUp(option) {
    switch (option) {
        case 'delete':
            btnDeleteFile.style.display = 'none';
            break;
        case 'move':
            btnRelocateFile.style.display = 'none';
            break;
        case 'both':
            btnRelocateFile.style.display = 'none';
            btnDeleteFile.style.display = 'none';
            break;
    }
}

function showOptionPopUp(option) {
    switch (option) {
        case 'delete':
            btnDeleteFile.style.display = 'initial';
            break;
        case 'move':
            btnRelocateFile.style.display = 'initial';
            break;
        case 'both':
            btnRelocateFile.style.display = 'initial';
            btnDeleteFile.style.display = 'initial';
            break;
    }
}

// Create Pop up Files

function createPopUpUpload(event) {
    const pathFile = event.currentTarget.getAttribute('folder-path');

    const divViewContent = document.querySelector('#view-content');
    const trashBtn = document.querySelector('#delete-file');

    hideOptionPopUp('both');

    let elForm = document.createElement('form');
    elForm.setAttribute('enctype', 'multipart/form-data');
    elForm.method = 'post';

    let divBackgroundUpload = document.createElement('div');
    divBackgroundUpload.className = 'upload-file-pop-up';

    let inputFile = document.createElement('input');
    inputFile.type = 'file';
    inputFile.name = 'uploadFile';

    let inputPath = document.createElement('input');
    inputPath.type = 'hidden';
    inputPath.name = 'uploadFolder';
    inputPath.value = pathFile;

    let btnUpload = document.createElement('button');
    btnUpload.textContent = 'Upload File';
    btnUpload.id = 'btn-upload-file';

    divViewContent.prepend(elForm);
    elForm.appendChild(divBackgroundUpload)
    divBackgroundUpload.appendChild(inputFile);
    divBackgroundUpload.appendChild(inputPath);
    divBackgroundUpload.appendChild(btnUpload);

    elForm.addEventListener('submit', (e) => {
        e.preventDefault();

        let formData = new FormData(elForm);

        fetch('../assets/upload-file.php', {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(info => {
                if (info.status) {
                    trashBtn.style.display = 'initial';

                    closePopUp();

                    if (pathFile.match("/")) {
                        if (pathFile.match("/")) {
                            displayInsideFolder(pathFile);
                        } else {
                            createFilesTab(pathFile);
                        }

                        alert(info.msg);
                    } else {
                        alert(info.msg);
                    }
                }
            });
    });

    displayPopUp();

    let btnClosePopUp = document.getElementById('close-popup');
    btnClosePopUp.addEventListener('click', () => {
        trashBtn.style.display = 'initial';
    })
}

function createFileContent(typeFile, data) {
    const containerContent = document.querySelector("#view-content");

    while (containerContent.firstChild) {
        containerContent.removeChild(containerContent.lastChild);
    }

    if (typeFile === "txt") {
        let elementTxt = document.createElement("div");
        elementTxt.textContent = data;
        containerContent.appendChild(elementTxt);
    } else if (typeFile === "img") {
        let elementImg = document.createElement("img");
        elementImg.src = data;
        elementImg.id = 'file-show-popup';
        containerContent.appendChild(elementImg);
    } else if (typeFile === "mp4") {
        let elementVideo = document.createElement("video");
        elementVideo.controls = true;
        elementVideo.id = 'file-show-popup';
        let elementSource = document.createElement("source");
        elementSource.src = data;
        elementSource.setAttribute("type", "video/mp4");
        containerContent.appendChild(elementVideo);
        elementVideo.appendChild(elementSource);
    } else if (typeFile === "mp3") {
        let elementAudio = document.createElement("audio");
        elementAudio.controls = true;
        elementAudio.id = 'file-show-popup';
        let elementAudioSource = document.createElement("source");
        elementAudioSource.src = data;
        elementAudioSource.setAttribute("type", "audio/mpeg");
        containerContent.appendChild(elementAudio);
        elementAudio.appendChild(elementAudioSource);
    }

    displayPopUp();
}


// PopUp open and PopUp Close

function displayPopUp() {
    const viewContent = document.querySelector('.pop-up-file');
    viewContent.classList.toggle('hidden');

}

function closePopUp() {
    const viewContent = document.querySelector('.pop-up-file');
    viewContent.classList.toggle('hidden');
    const containerContent = document.querySelector("#view-content");
    showOptionPopUp('both');
    while (containerContent.firstChild) {
        containerContent.removeChild(containerContent.lastChild);
    }
}

// AddEventListeners

window.addEventListener('load', getInfoFolders);

btnRelocateFile.addEventListener("click", moveFolders);

btnCreateFolder.addEventListener("click", createNewFolder);

btnClosePopUp.addEventListener('click', closePopUp);

btnOpenTrash.addEventListener("click", openTrashFolder);