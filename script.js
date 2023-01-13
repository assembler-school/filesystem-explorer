// const uploadFile = document.querySelector('.upload-file');
// const fileToUpload = document.querySelector('.file-to-upload');

const createFolder = document.querySelector('.create-btn');
const folderNameToCreate = document.querySelector('.folder-name');


createFolder.addEventListener("click", createNewFolder);



function createNewFolder() {

    console.log("hola")

    let folderName = folderNameToCreate.value;
    
    console.log(folderName);

    fetch ("../filesystem-explorer/create-folder.php?nameFolder="+folderName)
    .then(response => response.json())
    .then(data => console.log(data))

    location.reload();
}



const deleteFiles = document.querySelectorAll(".delete-btn");


deleteFiles.forEach(element => {
    element.addEventListener("click", deleteFolder)
});

function deleteFolder(event){
    console.log("funciona");
    const popUpDeleteConfirm = confirm("Do you want to delete this folder?");
    console.log(popUpDeleteConfirm);
    if (popUpDeleteConfirm){
        let actualFolderName = event.srcElement.getAttribute("actual-folder");
        console.log(actualFolderName);
        fetch("../delete.php?actualFolderName=./"+actualFolderName)
        .then(response=>response.json())
        .then(data =>console.log(data));
    }
}