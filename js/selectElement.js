const creationInfo = document.getElementById("creationInfo");
const modifiedInfo = document.getElementById("modifiedInfo");
const extensioinInfo = document.getElementById("extensioinInfo");
const sizeInfo = document.getElementById("sizeInfo");
const pathInfo = document.getElementById("pathInfo");
const pathSecondFolderTitle = document.querySelector("#pathSecondFolderTitle");
const filesListSecondChild = document.querySelector("#filesListSecondChild");
let dataPath = "";

filesPath.addEventListener("click", selectElementChildren);
filesPath.addEventListener("click", selectElementFather);

function selectElementChildren(event) {
    let selectedElementChildren = event.target.parentNode;
    if (selectedElementChildren.classList.contains("first-list")) {
        let firstList = selectedElementChildren;
        firstList.style.backgroundColor = "yellow";
        dataPath = selectedElementChildren.getAttribute('data-path');
        printFolderTitleName(selectedElementChildren);
        printFilesSecondChild(selectedElementChildren);
    }
}

function selectElementFather(event) {
    let selectedElementFather = event.target;
    if (selectedElementFather.classList.contains("first-list")) {
        let firstList = selectedElementFather;
        firstList.style.backgroundColor = "yellow";
        dataPath = selectedElementFather.getAttribute('data-path');
        printFolderTitleName(selectedElementFather);
        printFilesSecondChild(selectedElementFather);
    }
}

function printFolderTitleName(selectedElement) {
    getInfoFiles();
    if (selectedElement.getAttribute('type') == "folder") {
        pathSecondFolderTitle.textContent = "files/" + dataPath;
    }
}

function printFilesSecondChild() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    console.log(dataPathWithoutSlash);
    filesListSecondChild.innerHTML = "";
    fetch("modules/printFilesSecondChild.php" + "?" + "dataPathSecond=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            data.forEach(element =>
                filesListSecondChild.innerHTML += element);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInfoFiles() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfo.php" + "?" + "path=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            renderFileInfo(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function renderFileInfo(data) {
    if (data["size"] > 1000) {
        sizeInfo.innerHTML = "Size: " + Math.round(data["size"] / 1024) + "Mb";
    } else {
        sizeInfo.innerHTML = "Size: " + data["size"] + "Kb";
    }
    creationInfo.innerHTML = "Creation date: " + data["creationDate"];
    modifiedInfo.innerHTML = "Last modificaton: " + data["modificationDate"];
    pathInfo.innerHTML = "Path: " + "files/" + dataPath;
    extensioinInfo.innerHTML = "Extension: " + data["extension"];

    /* fileContent.innerHTML = "Content: " + data["content"]; */
}