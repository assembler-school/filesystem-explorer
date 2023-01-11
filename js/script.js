const addFolderImage = document.querySelector("#addFolderImage");
const ul = document.querySelector("#filesList");
const folderFilesContainer = document.querySelector("#folderFilesContainer");
let inputValue;
let nameFolder;
let li;
let inputCounter = 0;

addFolderImage.addEventListener("click", showImageFolder);
/* window.addEventListener("DOMContentLoaded", loadFolderImages);

function loadFolderImages(){
    fetch("modules/printFiles.php")
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    })
    .catch((err) => console.log("Request failed: ", err));
} */

function getInputValue(data){
    if(data ==="Exist"){
        inputValue.select();
    } else{
        nameFolder = inputValue.value;
        const p =  document.createElement("p");
        p.textContent = nameFolder;
        li.replaceChild(p, inputValue);
        addFolderImage.addEventListener("click", showImageFolder);
        /* showFoldersInMiddle(); */
        createFolder();
    }
}

/* function showFoldersInMiddle(){
    const img = document.createElement("img");
    img.setAttribute("src", "images/folderIconSmall.png");
    img.setAttribute("alt", "Folder");
    const span = document.createElement("span");
    span.classList.add("text-directory");
    const p = document.createElement("p");
    folderFilesContainer.appendChild(p);
    p.appendChild(img);
    p.appendChild(span);
    span.textContent = nameFolder;
} */

function checkDirectoryName(){
    fetch("modules/checkDirectoryName.php" + "?" + "directoryName=" + inputValue.value, {
        method: "GET",
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        getInputValue(data);
    })
    .catch((err) => console.log("Request failed: ", err));
}

function showImageFolder(){
    li = document.createElement("li");
    const img = document.createElement("img");
    img.setAttribute("src", "images/folderIconSmallx3.png");
    img.setAttribute("alt", "Folder");
    const input = document.createElement("input");
    input.setAttribute("id", "folderValues");
    input.setAttribute("type", "text");
    input.setAttribute("value", "New Folder");
    ul.appendChild(li);
    li.appendChild(img);
    li.appendChild(input);
    inputValue = document.querySelector("#folderValues");
    inputValue.addEventListener("focusout", checkDirectoryName);
    input.select();
    addFolderImage.removeEventListener("click", showImageFolder);
}

function createFolder() {
    fetch("modules/createFolder.php" + "?" + "directoryName=" + nameFolder, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            // renderFileInfo(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}