const addFolderImage = document.querySelector("#addFolderImage");
const ul = document.querySelector("#filesList");
const folderFilesContainer = document.querySelector("#folderFilesContainer");
const filesPath = document.querySelector("#filesPath");
let inputValue;
let inputRename;
let reNameFolder;
let nameFolder;
let li;
let inputEdit;
let inputCounter = 0;



ul.addEventListener("dblclick", renameFiles);

addFolderImage.addEventListener("click", showImageFolder);
/* filesPath.addEventListener("dblclick", renameFolder);

function renameFolder(event){
    let classFolder = event.target.classList;
    if (classFolder=="folder-list"){
        const input = document.createElement("input");
        const p = document.querySelector("."+classFolder)
        input.setAttribute("id", "folderValues");
        input.setAttribute("type", "text");
        input.setAttribute("value", "New Folder");
        li.replaceChild(inputValue, p);
        inputValue = document.querySelector("#folderValues");
        inputValue.addEventListener("focusout", checkDirectoryName);
        input.select();
        addFolderImage.removeEventListener("click", showImageFolder);
        getInputValue();
    }
}
 */

/* window.addEventListener("DOMContentLoaded", loadFolderImages);

function loadFolderImages(){
    fetch("modules/printFiles.php")
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
    })
    .catch((err) => console.log("Request failed: ", err));
} */

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

function renameFiles(e) {
    if (e.target.matches(".text-list")) {
        let textValue = e.target;
        /* oldDirectoryName = textValue.textContent; */
        /* console.log(oldDirectoryName); */
        let padre = e.target.parentNode;
        inputRename = document.createElement("input");
        inputRename.setAttribute("id", "folderValues");
        inputRename.setAttribute("class", "folder-list-input");
        inputRename.setAttribute("type", "text");
        inputRename.setAttribute("value", textValue.textContent);
        padre.replaceChild(inputRename, textValue);
        inputRename.addEventListener("focusout", checkDirectoryReName);
        inputRename.select();
    }
}

function checkDirectoryReName(){
    fetch("modules/checkDirectoryName.php" + "?" + "directoryName=" + inputRename.value, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            getInputRenameValue(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInputRenameValue(data){
    if (data === "Exist") {
        inputRename.select();
    } else {
        reNameFolder = inputRename.value;
        const span = document.createElement("span");
        span.classList.add("text-list");
        span.textContent = reNameFolder;
        li = document.querySelector('[data-path="'+dataPath+'"]');
        console.log(li);
        inputRename.remove();
        li.appendChild(span);
        renameFolder();
    }
}

function renameFolder(){
    fetch("modules/reNameFolder.php?directoryNewName=" + reNameFolder + "&directoryOldName=" + "hola", {
         method: "GET",
     })
         .then((response) => response.json())
         .then((data) => {
             console.log(data);
         })
         .catch((err) => console.log("Request failed: ", err));
    console.log("hola");
};

function showImageFolder() {
    li = document.createElement("li");
    li.setAttribute("id", "folderValues");
    li.setAttribute("class", "first-list");
    li.setAttribute("type", "folder");
    const img = document.createElement("img");
    img.setAttribute("src", "images/folderIconSmallx3.png");
    img.setAttribute("alt", "Folder");
    img.classList.add("folder-list-img");
    const input = document.createElement("input");
    input.setAttribute("id", "folderValues");
    input.setAttribute("class", "folder-list-input");
    input.setAttribute("type", "text");
    input.setAttribute("value", "New folder");
    ul.appendChild(li);
    li.appendChild(img);
    li.appendChild(input);
    inputValue = input;
    inputValue.addEventListener("focusout", checkDirectoryName);
    input.select();
    addFolderImage.removeEventListener("click", showImageFolder);
}

function checkDirectoryName() {
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

function getInputValue(data) {
    if (data === "Exist") {
        inputValue.select();
    } else {
        nameFolder = inputValue.value;
        const span = document.createElement("span");
        span.classList.add("text-list");
        span.textContent = nameFolder;
        li.setAttribute("data-path", nameFolder + "/");
        li = document.querySelector("#folderValues");
        inputValue.remove();
        li.appendChild(span);
        addFolderImage.addEventListener("click", showImageFolder);
        createFolder();
    }
}

function createFolder() {
    fetch("modules/createFolder.php" + "?" + "directoryName=" + dataPath + nameFolder, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data === "Error creando directorio") {
                console.log("estoy dentro")
                li.remove();
                img.remove();
                p.remove();
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}