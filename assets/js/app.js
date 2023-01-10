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
        console.log(pathFile);
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
    console.log("hola")
    let atrituboFile = event.srcElement.getAttribute("filePath")
    fetch ("../assets/display-info-file.php?filePath="+atrituboFile)
    .then (response => response.json())
    .then (data => console.log(data))
    
}





