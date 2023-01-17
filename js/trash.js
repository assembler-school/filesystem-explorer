
folderTrash.addEventListener("click", printFilesTrash);

function printFilesTrash() {
    filesListSecondChild.textContent = "";
    modificationListSecondChild.textContent = "";
    sizeListSecondChild.textContent = "";
    if(firstList !== ""){
        firstList.style.backgroundColor = "#D9D9D9";
        printFolderTitleNameTrash(lastList);
    }else {
        pathSecondFolderTitle.textContent = "trash/";
    }
    
    fetch("modules/printFilesTrash.php", {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element =>
                filesListSecondChild.innerHTML += element);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function printFolderTitleNameTrash(selectedElement) {
    getInfoFilesCornerTrash();
    getInfoFilesSecondTrash();
    if (selectedElement.getAttribute('type') === "trash") {
        pathSecondFolderTitle.textContent = "trash/" + dataPath;
    }
}

function getInfoFilesCornerTrash() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfoTrash.php" + "?" + "path=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            renderFileInfoCorner(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInfoFilesSecondTrash() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfoTrash.php" + "?" + "path=" + dataPathWithoutSlash, {
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

function moveFilesTrash() {
    deleteFile.removeEventListener("click", moveFilesTrash);
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/moveFilesTrash.php" + "?" + "dataPath=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            console.log(lastList);
            lastList.remove();
        })
        .catch((err) => console.log("Request failed: ", err));
}