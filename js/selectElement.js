const creationInfo = document.getElementById("creationInfo");
const modifiedInfo = document.getElementById("modifiedInfo");
const extensioinInfo = document.getElementById("extensioinInfo");
const folderFilesContainer = document.querySelector("#folderFilesContainer");
const sizeInfo = document.getElementById("sizeInfo");
const pathInfo = document.getElementById("pathInfo");
const pathSecondFolderTitle = document.querySelector("#pathSecondFolderTitle");
const filesListSecondChild = document.querySelector("#filesListSecondChild");
const sizeListSecondChild = document.querySelector("#sizeListSecondChild");
const modificationListSecondChild = document.querySelector("#modificationListSecondChild");
const arrowLeft = document.querySelector("#arrowLeft");
let dataPath = "";
let typeDocument;
let selectedElement;


folderFilesContainer.addEventListener("dblclick", selectElement);
folderFilesContainer.addEventListener("click", selectSecondElement);
ul.addEventListener("click", selectElement);
ul.addEventListener("click", getTextValueAndPadre);
arrowLeft.addEventListener("click", goBackDirectory);

function selectElement(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    if (parentNode.classList.contains("first-list")) {
        let firstList = parentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = parentNode.getAttribute('data-path');
        typeDocument = parentNode.getAttribute('type');
        selectedElement = parentNode;
        printFolderTitleName(parentNode);
    } else if (currentNode.classList.contains("first-list")) {
        let firstList = currentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = currentNode.getAttribute('data-path');
        typeDocument = parentNode.getAttribute('type');
        parentNode = currentNode;
        printFolderTitleName(currentNode);
    }
    if (typeDocument == "folder") {
        sizeListSecondChild.innerHTML = "";
        modificationListSecondChild.innerHTML = "";
        printFilesSecondChild();
    }
}

function selectSecondElement(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    if (parentNode.classList.contains("first-list")) {
        let firstList = parentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = parentNode.getAttribute('data-path');
    } else if (currentNode.classList.contains("first-list")) {
        let firstList = currentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = currentNode.getAttribute('data-path');
    }
    getInfoFilesCorner();
}

function getTextValueAndPadre(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    let secondChild = event.target.lastChild;
    let nextChild = event.target.nextElementSibling;
    if (parentNode.classList.contains("text-list")) {
        textValue = parentNode;
        padre = textValue.parentNode;
    } else if (currentNode.classList.contains("text-list")) {
        textValue = currentNode;
        padre = textValue.parentNode;
    } else if (secondChild.classList.contains("text-list")) {
        textValue = secondChild;
        padre = textValue.parentNode;
    } else if (nextChild.classList.contains("text-list")) {
        textValue = nextChild;
        padre = textValue.parentNode;
    }
}

function printFolderTitleName(selectedElement) {
    getInfoFilesCorner();
    getInfoFilesSecond();
    if (selectedElement.getAttribute('type') == "folder") {
        pathSecondFolderTitle.textContent = "files/" + dataPath;
    } else {
        let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
        pathSecondFolderTitle.textContent = "files/" + dataPathWithoutSlash;
    }
}

function printFilesSecondChild() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    filesListSecondChild.innerHTML = "";
    fetch("modules/printFilesSecondChild.php" + "?" + "dataPathSecond=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element =>
                filesListSecondChild.innerHTML += element);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInfoFilesCorner() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfo.php" + "?" + "path=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            renderFileInfoCorner(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInfoFilesSecond() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfo.php" + "?" + "path=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            renderFileInfoSecond(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function renderFileInfoCorner(data) {
    if (data["size"] > 1000) {
        sizeInfo.innerHTML = "Size: " + Math.round(data["size"] / 1024) + "Mb";
    } else {
        sizeInfo.innerHTML = "Size: " + data["size"] + "Kb";
    }
    creationInfo.innerHTML = "Creation date: " + data["creationDate"];
    modifiedInfo.innerHTML = "Last modificaton: " + data["modificationDate"];
    pathInfo.innerHTML = "Path: " + "files/" + dataPath;
    extensioinInfo.innerHTML = "Extension: " + data["extension"];
}

function renderFileInfoSecond(data) {
    if (dataPath != "") {
        let dataLength = Object.keys(data).length;
        for (let i = 0; i < dataLength; i++) {
            if ("size" + `${i}` in data) {
                let sizeVariable = "size" + i;
                let modificationVariable = "modificationDate" + i;
                let foundSize = data[sizeVariable];
                let foundModificationDate = data[modificationVariable];
                if (foundSize > 1000) {
                    foundSize = Math.round(foundSize / 1024) + "Mb";
                } else {
                    foundSize = foundSize + "Kb";
                }
                sizeListSecondChild.innerHTML += "<div class='second-flex second-info'>" + foundSize + "</div>";
                modificationListSecondChild.innerHTML += "<div class='second-flex second-info'>" + foundModificationDate + "</div>";
            }
        }
    }
    /* fileContent.innerHTML = "Content: " + data["content"]; */
}

function goBackDirectory() {
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    dataPath = dataPath.split("/");
    dataPath.pop();
    dataPath.pop();
    dataPath = dataPath.join("/");
    dataPath = dataPath + "/";
    if (dataPath == "/") {
        dataPath = "";
        filesListSecondChild.innerHTML = "";
    } else {
        printFilesSecondChild();
    }
    getInfoFilesCorner();
    getInfoFilesSecond();
    pathSecondFolderTitle.textContent = "files/" + dataPath;
}