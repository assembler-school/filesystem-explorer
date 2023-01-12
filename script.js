// const uploadFile = document.querySelector('.upload-file');
// const fileToUpload = document.querySelector('.file-to-upload');

const createFolder = document.querySelector('.create-btn');
const folderNameToCreate = document.querySelector('.folder-name');


createFolder.addEventListener("click", createNewFolder);


function createNewFolder() {

    let folderName = folderNameToCreate.value;
    fetch('../filesystem-explorer/upload-file.php?nameFolder='+folderName);

}



