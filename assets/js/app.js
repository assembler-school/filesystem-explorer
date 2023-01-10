const createFolder = document.querySelector("#button-folder-name");

createFolder.addEventListener("click", createNewFolder);

function createNewFolder(){
    let folderName = document.querySelector("#folder-name").value;
    console.log(folderName)
    fetch ("../assets/folder.php?nameFolder="+folderName)
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

   fetch ("../assets/modifyFolder.php?nameFolder="+newName+"&actualFolderName="+actualFolderName)
    .then (response => response.json())
    .then (data => console.log(data)) 


}

function deleteFolders(event){
const popUpDeleteConfirm = confirm("Do you want delete this folder?");

if(popUpDeleteConfirm){
    let actualFolderName = event.srcElement.getAttribute('actual-folder');
     fetch ("../assets/deleteFolder.php?actualFolderName="+actualFolderName)
    .then (response => response.json())
    .then (data => console.log(data))
}

   
}