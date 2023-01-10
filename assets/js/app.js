const createFolder = document.querySelector("#button-folder-name");

createFolder.addEventListener("click", createNewFolder);

function createNewFolder(){
    let folderName = document.querySelector("#folder-name").value;
    console.log(folderName)
    fetch ("../assets/folder.php?nameFolder="+folderName)
    .then (response => response.json())
    .then (data => console.log(data))
}

const modifyNameFolder = document.querySelector("#modify-name-folder");
const deleteFolder = document.querySelector("#delete-folder");
