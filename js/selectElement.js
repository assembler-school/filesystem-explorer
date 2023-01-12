const creationInfo = document.getElementById("creationInfo");
const modifiedInfo = document.getElementById("modifiedInfo");
const extensioinInfo = document.getElementById("extensioinInfo");
const sizeInfo = document.getElementById("sizeInfo");
const pathInfo = document.getElementById("pathInfo");
const pathSecondFolderTitle = document.querySelector("#pathSecondFolderTitle");
let dataPath = "";

filesPath.addEventListener("click", selectElementChildren);
filesPath.addEventListener("click", selectElementFather);
filesPath.addEventListener("click", printFolderTitleName);

function selectElementChildren(event) {
    let selectedElementChildren = event.target.parentNode;
    if (selectedElementChildren.classList.contains("first-list")) {
        let firstList = selectedElementChildren;
        firstList.style.backgroundColor = "yellow";
    }
}
function selectElementFather(event) {
    let selectedElementFather = event.target;
    if (selectedElementFather.classList.contains("first-list")) {
        let firstList = selectedElementFather;
        firstList.style.backgroundColor = "yellow";
    }
}

function printFolderTitleName(event) {
    let selectedElement = event.target.parentNode;
    dataPath = selectedElement.getAttribute('data-path');
    printInfoFiles();
    if (selectedElement.getAttribute('type') == "folder") {
        pathSecondFolderTitle.textContent = "files/" + dataPath;
       /*  fetch("modules/printFilesSecondChild.php" + "?" + "dataPath=" + "files/" + dataPath, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            getInputValue(data);
        })
        .catch((err) => console.log("Request failed: ", err)); */
    }
}

function printInfoFiles() {
    dataPathWithoutSlash = dataPath.substring(0, dataPath.length-1);
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
    if(data["size"]>1000){
        sizeInfo.innerHTML = "Size: " + Math.round(data["size"]/1024) + "Mb";
    } else {
        sizeInfo.innerHTML = "Size: " + data["size"] + "Kb";
    }
    creationInfo.innerHTML = "Creation date: " + data["creationDate"];
    modifiedInfo.innerHTML = "Last modificaton: " + data["modificationDate"];
    pathInfo.innerHTML = "Path: " + "files/" + dataPath;
    extensioinInfo.innerHTML = "Extension: " + data["extension"];

    /* fileContent.innerHTML = "Content: " + data["content"]; */
}