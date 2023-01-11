const addFolderImage = document.querySelector("#addFolderImage");
const ul = document.querySelector("#filesList");
let inputValue;
let nameFolder;
let li;
let inputCounter = 0;

addFolderImage.addEventListener("click", showImageFolder);

function getInputValue(){
    checkDirectoryName();
    nameFolder= inputValue.value;
    const p =  document.createElement("p");
    p.textContent = nameFolder;
    li.replaceChild(p, inputValue);
    createFolder();
}

function checkDirectoryName(){
    fetch("modules/checkDirectoryName.php" + "?" + "directoryName=" + nameFolder, {
        method: "GET",
    })
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        // renderFileInfo(data);
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
    inputValue.addEventListener("focusout", getInputValue);
    input.select();
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