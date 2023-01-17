const modificationListSecondChild = document.querySelector("#modificationListSecondChild");
const pathSecondFolderTitle = document.querySelector("#pathSecondFolderTitle");
const folderFilesContainer = document.querySelector("#folderFilesContainer");
const filesListSecondChild = document.querySelector("#filesListSecondChild");
const sizeListSecondChild = document.querySelector("#sizeListSecondChild");
const extensioinInfo = document.getElementById("extensioinInfo");
const creationInfo = document.getElementById("creationInfo");
const modifiedInfo = document.getElementById("modifiedInfo");
const arrowLeft = document.querySelector("#arrowLeft");
const sizeInfo = document.getElementById("sizeInfo");
const pathInfo = document.getElementById("pathInfo");
let avoidRechargeFirstList = false;
let secondListOld = "";
let firstListOld = "";
let oldDataPath = "a";
let modificationOnly;
let secondList = "";
let selectedElement;
let firstList = "";
let dataPath = "";
let typeDocument;
let counter = 0;
let sizeOnly;


folderFilesContainer.addEventListener("click", selectSecondElement);
folderFilesContainer.addEventListener("dblclick", selectElementSecond);
arrowLeft.addEventListener("click", goBackDirectory);
ul.addEventListener("click", getTextValueAndPadre);
ul.addEventListener("click", selectElementFirst);
ul.addEventListener("click", showOnlyFile);

function putOffSelectElementColorFirst() {
    if (firstListOld != "") {
        if (firstListOld.style.backgroundColor === "yellow" && firstListOld !== firstList) {
            firstListOld.style.backgroundColor = "#D9D9D9";
        }
    }
}

function putOffSelectElementColorSecond() {
    if (secondListOld.style.backgroundColor === "yellow" && secondListOld !== secondList) {
        secondListOld.style.backgroundColor = "#D9D9D9";
    }
}

function selectElementFirst(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    firstListOld = firstList;
    oldDataPath = dataPath;
    if (parentNode.classList.contains("first-list")) {
        firstList = parentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = parentNode.getAttribute('data-path');
        typeDocument = parentNode.getAttribute('type');
        selectedElement = parentNode;
        if (oldDataPath != dataPath) {
            printFolderTitleName(parentNode);
        }
    } else if (currentNode.classList.contains("first-list")) {
        firstList = currentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = currentNode.getAttribute('data-path');
        typeDocument = parentNode.getAttribute('type');
        parentNode = currentNode;
        if (oldDataPath != dataPath) {
            printFolderTitleName(currentNode);
        }
    }
    if (typeDocument == "folder") {
        if (oldDataPath != dataPath) {
        sizeListSecondChild.innerHTML = "";
        modificationListSecondChild.innerHTML = "";
            printFilesSecondChild();
        }
    } else if (typeDocument == "file") {
        showPreview();
    }
    if (firstListOld != "") {
        window.addEventListener("click", putOffSelectElementColorFirst);
    }
    levelDirectory = (dataPath.match(/\//g) || []).length;
    console.log(dataPath)
    console.log(levelDirectory)
}

function selectElementSecond(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    firstListOld = firstList;
    oldDataPath = dataPath;
    if (parentNode.classList.contains("first-list")) {
        firstList = parentNode;
        firstList.style.backgroundColor = "yellow";
        dataPath = parentNode.getAttribute('data-path');
        typeDocument = parentNode.getAttribute('type');
        selectedElement = parentNode;
        printFolderTitleName(parentNode);
    } else if (currentNode.classList.contains("first-list")) {
        firstList = currentNode;
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
    } else if (typeDocument == "file") {
        showMedia();
    }
    if (firstListOld != "") {
        window.addEventListener("click", putOffSelectElementColorFirst);
    }
    levelDirectory = (dataPath.match(/\//g) || []).length;
    console.log(dataPath)
    console.log(levelDirectory)
}

function showOnlyFile(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    if (parentNode.classList.contains("first-list")) {
        typeDocument = parentNode.getAttribute('type');
    } else if (currentNode.classList.contains("first-list")) {
        typeDocument = parentNode.getAttribute('type');
    }
    
    if (typeDocument == "file") {
        let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
        let arrayDataPath = dataPathWithoutSlash.split(".");
        let dataPathExt = arrayDataPath.slice(-1)[0];
        arrayDataPath.pop();
        if (dataPathExt == "jpeg") {
            dataPathExt = "jpg";
        }
        dataPathExt = dataPathExt.toUpperCase();
        arrayDataPath.join('.');
        filesListSecondChild.innerHTML = "<div class='first-list second-flex' data-path='" + dataPath + "' type='file'><img class='folder-second-list-img' src='images/" + dataPathExt + "Icon.png' alt='document icon'><span class='text-second-list'>" + arrayDataPath + "</span><span class='extesion-file'>" + dataPathExt + "</span></div>";
        counter = 1;
    }
}

function selectSecondElement(event) {
    let parentNode = event.target.parentNode;
    let currentNode = event.target;
    secondListOld = secondList;
    if (parentNode.classList.contains("first-list")) {
        secondList = parentNode;
        secondList.style.backgroundColor = "yellow";
        dataPath = parentNode.getAttribute('data-path');
        printFolderTitleName(parentNode);
    } else if (currentNode.classList.contains("first-list")) {
        secondList = currentNode;
        secondList.style.backgroundColor = "yellow";
        dataPath = currentNode.getAttribute('data-path');
        printFolderTitleName(currentNode);
    }
    if (secondListOld != "") {
        window.addEventListener("click", putOffSelectElementColorSecond);
    }
    if (typeDocument == "folder") {
        hidePreview();
    }
    showPreview();
    getInfoFilesCorner();
    levelDirectory = (dataPath.match(/\//g) || []).length;
    console.log(dataPath)
    console.log(levelDirectory)

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
    if (selectedElement.getAttribute('type') === "folder") {
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
            console.log(data)
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
            if (data != "Error in opening file") {
                renderFileInfoSecond(data);
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}

function renderFileInfoCorner(data) {
    if (data["size"] > 1000) {
        sizeInfo.innerHTML = "Size: " + Math.round(data["size"] / 1024) + "Mb";
        let sizeOnlyVar = Math.round(data["size"] / 1024) + "Mb";
        sizeOnly = "<div class='second-flex second-info'>" + sizeOnlyVar + "</div>";
    } else {
        sizeInfo.innerHTML = "Size: " + data["size"] + "Kb";
        let sizeOnlyVar = data["size"] + "Kb";
        sizeOnly = "<div class='second-flex second-info'>" + sizeOnlyVar + "</div>";
    }
    creationInfo.innerHTML = "Creation date: " + data["creationDate"];
    modifiedInfo.innerHTML = "Last modificaton: " + data["modificationDate"];
    if (dataPath.includes(".")) {
        let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
        pathInfo.innerHTML = "Path: " + "files/" + dataPathWithoutSlash;
    } else {
        pathInfo.innerHTML = "Path: " + "files/" + dataPath;
    }
    extensioinInfo.innerHTML = "Extension: " + data["extension"];
    modificationOnly = "<div class='second-flex second-info'>" + data["modificationDate"] + "</div>";
    if (counter == 1) {
        sizeListSecondChild.innerHTML = sizeOnly;
        modificationListSecondChild.innerHTML = modificationOnly;
        counter = 0;
    }
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