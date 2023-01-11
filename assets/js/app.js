const createFolder = document.querySelector("#button-folder-name");
createFolder.addEventListener("click", createNewFolder);

function createNewFolder(){
    let folderName = document.querySelector("#folder-name").value;
    console.log(folderName)
    fetch ("../assets/create-folder.php?nameFolder="+folderName)
    .then (response => response.json())
    .then (data => console.log(data))
}

const modifyNameFolder = document.querySelectorAll(".modify-name-folder");
const deleteFolder = document.querySelectorAll(".delete-folder");


modifyNameFolder.forEach((item)=>{
    item.addEventListener("click", modifyNameFolders)});


deleteFolder.forEach((item)=>{
    item.addEventListener("click", deleteFolders)});



function modifyNameFolders(event){
    let newName = prompt("Put new folder name, please");
    let actualFolderName = event.srcElement.getAttribute('actual-folder');

    if(newName){
   fetch ("../assets/modify-folder.php?nameFolder="+newName+"&actualFolderName="+actualFolderName)
    .then (response => response.json())
    .then (data => console.log(data)) }
} 

function deleteFolders(event){
const popUpDeleteConfirm = confirm("Do you want delete this folder?");

if(popUpDeleteConfirm){
    let actualFolderName = event.srcElement.getAttribute('actual-folder');
     fetch ("../assets/delete-folder.php?actualFolderName="+actualFolderName)
    .then (response => response.json())
    .then (data => console.log(data))
}
}

const selectFolder = document.querySelectorAll(".select-folder");



selectFolder.forEach((item)=>{
    item.addEventListener("click", selectFolders)});

function selectFolders(event){
    const containerOpenFolder = document.querySelector("#open-folder");

    while(containerOpenFolder.firstChild){
        containerOpenFolder.removeChild(containerOpenFolder.lastChild);
    }
    
    let openFolder = event.srcElement.getAttribute('name-folder');
    fetch ("../assets/display-content.php?actualFolderName="+openFolder)
    .then (response => response.json())
    .then (data => showelementosOfFolder(data))

    let nameOfFolder = document.createElement("p");
    nameOfFolder.textContent = openFolder;
    containerOpenFolder.appendChild(nameOfFolder);
    let inputUploadFile = document.getElementsByName("uploadFolder")[0];
    inputUploadFile.value = openFolder;

}

function showelementosOfFolder(data){
    data.forEach(file =>{
        const containerOpenFolder = document.querySelector("#open-folder");
        let divFile = document.createElement("div");
        let cutPath = file.lastIndexOf("/");
        let pathFile = file.slice(cutPath+1);
        divFile.textContent = pathFile;
        containerOpenFolder.appendChild(divFile);
        divFile.className += "elemtoOfFolder";
        divFile.setAttribute("filePath", file);
    let bodyTable = document.createElement("table");
    let tableRow = document.createElement("tr");
    let tabletColumnCreate = document.createElement("td");
    let tabletColumnModify = document.createElement("td");
    let tabletColumnSize = document.createElement("td");

    containerOpenFolder.appendChild(bodyTable);
    bodyTable.appendChild(tableRow);
    tableRow.appendChild(tabletColumnCreate);
    tableRow.appendChild(tabletColumnModify);
    tableRow.appendChild(tabletColumnSize);

    
    tabletColumnCreate.textContent = "pruebe";
    tabletColumnModify.textContent = "pruebe";
    tabletColumnSize.textContent = "pruebe";

    })



let folderElement = document.querySelectorAll(".elemtoOfFolder");
folderElement.forEach((item)=>{
    item.addEventListener("click", showInfoElement)});
}


const buttonNewFile = document.querySelector("#upload-file");
buttonNewFile.addEventListener("click", addNewFile);

function addNewFile(){
    let NewFile = document.querySelectorAll(".upload-new-file");  
}



function showInfoElement(event){
    let atrituboFile = event.srcElement.getAttribute("filePath")
    let cutExtension = atrituboFile.lastIndexOf(".");
    let pathExtension = atrituboFile.slice(cutExtension+1);

    let formatImg = ["jpg", "png", "webp"];

    if(formatImg.includes(pathExtension)){
        pathExtension = "img";
    }
    switch(pathExtension){
        case "txt":
            fetch ("../assets/display-info-file.php?filePath="+atrituboFile)
            .then (response => response.json())
            .then (data => createFileContent("txt", data, atrituboFile))
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
}

function createFileContent(typeFile, data, path){
    const containerContent = document.querySelector("#display-content");

    while(containerContent.firstChild){
        containerContent.removeChild(containerContent.lastChild);
    }
    if(typeFile === "txt"){
        
        let elementTxt = document.createElement("div");
        elementTxt.textContent = data;
        containerContent.appendChild(elementTxt);
        fetch("../assets/display-information-file.php?pathFile="+path)
        .then(response=> response.json())
        .then(data => console.log(data))
    
    } else if(typeFile === "img"){
        let elementImg = document.createElement("img");
        elementImg.src = data;
        containerContent.appendChild(elementImg);

    } else if(typeFile === "mp4"){
        let elementVideo = document.createElement("video");
        elementVideo.controls = true;
        let elementSource = document.createElement("source");
        elementSource.src = data;
        elementSource.setAttribute("type", "video/mp4");
        containerContent.appendChild(elementVideo);
        elementVideo.appendChild(elementSource);

    } else if(typeFile === "mp3"){
        let elementAudio = document.createElement("audio");
        elementAudio.controls = true;
        let elementAudioSource = document.createElement("source");
        elementAudioSource.src = data;
        elementAudioSource.setAttribute("type", "audio/mpeg");
        containerContent.appendChild(elementAudio);
        elementAudio.appendChild(elementAudioSource);
}
}



