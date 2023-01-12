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



