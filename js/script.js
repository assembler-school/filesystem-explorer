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
let oldDirectoryName;


ul.addEventListener("dblclick", renameFiles);

addFolderImage.addEventListener("click", showImageFolder);

function renameFiles(e) {
    if (e.target.matches(".text-list")) {
        let textValue = e.target;
        oldDirectoryName = textValue.textContent;
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
    fetch("modules/reNameFolder.php?directoryNewName=" + reNameFolder + "&directoryOldName=" + oldDirectoryName, {
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
        li = document.querySelector('[data-path="'+nameFolder+"/"+'"]');
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
                li.remove();
                img.remove();
                p.remove();
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}