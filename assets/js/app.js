const createFolder = document.querySelector("#button-folder-name");
createFolder.addEventListener("click", createNewFolder);

function createNewFolder() {
    let folderName = document.querySelector("#folder-name").value;
    console.log(folderName)
    fetch("../assets/create-folder.php?nameFolder=" + folderName)
        .then(response => response.json())
        .then(data => console.log(data))
}

const modifyNameFolder = document.querySelectorAll(".modify-name-folder");
const deleteFolder = document.querySelectorAll(".delete-folder");


modifyNameFolder.forEach((item) => {
    item.addEventListener("click", modifyNameFolders)
});


deleteFolder.forEach((item) => {
    item.addEventListener("click", deleteFolders)
});



function modifyNameFolders(event) {
    let newName = prompt("Put new folder name, please");
    let actualFolderName = event.srcElement.getAttribute('actual-folder');

    if (newName) {
        fetch("../assets/modify-folder.php?nameFolder=" + newName + "&actualFolderName=" + actualFolderName)
            .then(response => response.json())
            .then(data => console.log(data))
    }
}

function deleteFolders(event) {
    const popUpDeleteConfirm = confirm("Do you want delete this folder?");

    if (popUpDeleteConfirm) {
        let actualFolderName = event.srcElement.getAttribute('actual-folder');
        fetch("../assets/delete-folder.php?actualFolderName=" + actualFolderName)
            .then(response => response.json())
            .then(data => console.log(data))
    }
}

const selectFolder = document.querySelectorAll(".select-folder");



selectFolder.forEach((item) => {
    item.addEventListener("click", selectFolders)
});

function selectFolders(event) {
    const containerOpenFolder = document.querySelector("#open-folder");

    while (containerOpenFolder.firstChild) {
        containerOpenFolder.removeChild(containerOpenFolder.lastChild);
    }

    let openFolder = event.srcElement.getAttribute('name-folder');
    fetch("../assets/display-content.php?actualFolderName=" + openFolder)
        .then(response => response.json())
        .then(data => showelementosOfFolder(data))

    let inputUploadFile = document.getElementsByName("uploadFolder")[0];
    inputUploadFile.value = openFolder;

    //Table
    let bodyTable = document.createElement("table");
    let tableRow = document.createElement("tr");
    let rowHead = document.createElement("th");

    containerOpenFolder.appendChild(bodyTable);
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
            .then(data => constuctorTable(data, pathFile, trFile))

    })



    let folderElement = document.querySelectorAll(".elemtoOfFolder");
    folderElement.forEach((item) => {
        item.addEventListener("click", showInfoElement)
    });
}

function constuctorTable(data, pathFile, trFile) {
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
            switch(i){
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
                    break
            }
            let tdRow = document.createElement("td");
            tdRow.textContent = infoTd;


            if(i===0){
                let extension = getPathExtension(pathFile);
                console.log(extension)
               let img = document.createElement("img");
               
                switch(extension){
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
                        img.src = "../image/img2.png";
                        break
                }
                tdRow.prepend(img);
            }
            trFile.appendChild(tdRow);
         } 

}


function getPathExtension(path){
    let cutExtension = path.lastIndexOf(".");
    let pathExtension = path.slice(cutExtension+1);
    let formatImg = ["jpg", "png", "webp"];

    if(formatImg.includes(pathExtension)){
        pathExtension = "img";
    }

    return pathExtension;
}


const buttonNewFile = document.querySelector("#upload-file");
buttonNewFile.addEventListener("click", addNewFile);

function addNewFile() {
    let NewFile = document.querySelectorAll(".upload-new-file");
}



function showInfoElement(event){
    let atrituboFile = event.srcElement.getAttribute("filePath")
    let pathExtension = getPathExtension(atrituboFile);

    switch(pathExtension){
        case "txt":
            let pathTxt = "../" + atrituboFile;
            fetch("assets/display-info-file.php?filePath=" + pathTxt)
                .then(response => response.json())
                .then(data => createFileContent("txt", data, atrituboFile))

            break
        case "img":
            createFileContent("img", atrituboFile);
            break
        case "mp4":
            createFileContent("mp4", atrituboFile);
            break
        case "mp3":
            createFileContent("mp3", atrituboFile);
            break
        default:
            console.log("no podemos descargar este archivo")
            break
    }

    displayPopUp();
}

function createFileContent(typeFile, data, pathTxt) {
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
        containerContent.appendChild(elementImg);

    } else if (typeFile === "mp4") {
        let elementVideo = document.createElement("video");
        elementVideo.controls = true;
        let elementSource = document.createElement("source");
        elementSource.src = data;
        elementSource.setAttribute("type", "video/mp4");
        containerContent.appendChild(elementVideo);
        elementVideo.appendChild(elementSource);

    } else if (typeFile === "mp3") {
        let elementAudio = document.createElement("audio");
        elementAudio.controls = true;
        let elementAudioSource = document.createElement("source");
        elementAudioSource.src = data;
        elementAudioSource.setAttribute("type", "audio/mpeg");
        containerContent.appendChild(elementAudio);
        elementAudio.appendChild(elementAudioSource);
    }
}

const btnClosePopUp = document.getElementById("close-popup");

function displayPopUp() {
    const viewContent = document.querySelector('.pop-up-file');
    viewContent.classList.toggle('hidden');
}

function closePopUp() {
    const viewContent = document.querySelector('.pop-up-file');
    viewContent.classList.toggle('hidden');
}

btnClosePopUp.addEventListener('click', closePopUp);