let oneClick = false;
folderTrash.addEventListener("click", printFilesTrash);


function cleanTrash() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/cleanTrash.php" + "?" + "dataPathSecond=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => printFilesTrash())
        .catch((err) => console.log("Request failed: ", err));
}

function printFilesTrash() {
    filesListSecondChild.textContent = "";
    modificationListSecondChild.textContent = "";
    sizeListSecondChild.textContent = "";
    dataPath = "";
    if (firstList !== "") {
        firstList.style.backgroundColor = "#D9D9D9";
        printFolderTitleNameTrash();
    } else {
        pathSecondFolderTitle.textContent = "trash/";
        printFolderTitleNameTrash();
    }
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/printFilesTrash.php" + "?" + "dataPathSecond=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element =>
                filesListSecondChild.innerHTML += element);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function printFolderTitleNameTrash() {
    pathSecondFolderTitle.textContent = "trash/" + dataPath;
    if (oneClick !== true) {
        sizeListSecondChild.innerHTML = "";
        modificationListSecondChild.innerHTML = "";
        getInfoFilesSecondTrash();
        getInfoFilesCornerTrash();

    }


}

function getInfoFilesCornerTrash() {
    let dataPathWithoutSlash = "";
    if (dataPath !== "") {
        dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);

    }

    fetch("modules/fileInfoTrash.php" + "?" + "path=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data)
            renderFileInfoCornerTrash(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}

function getInfoFilesSecondTrash() {
    let dataPathWithoutSlash = "";
    if (dataPath !== "") {
        dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    }

    fetch("modules/fileInfoTrash.php" + "?" + "path=" + dataPathWithoutSlash, {
        method: "GET",
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data != "Error in opening file") {
                renderFileInfoSecondTrash(data);
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}

function renderFileInfoCornerTrash(data) {
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
        pathInfo.innerHTML = "Path: " + "trash/" + dataPathWithoutSlash;
    } else {
        pathInfo.innerHTML = "Path: " + "trash/" + dataPath;
    }
    extensioinInfo.innerHTML = "Extension: " + data["extension"];
    modificationOnly = "<div class='second-flex second-info'>" + data["modificationDate"] + "</div>";
    if (counter == 1) {
        sizeListSecondChild.innerHTML = sizeOnly;
        modificationListSecondChild.innerHTML = modificationOnly;
        counter = 0;
    }
}

function renderFileInfoSecondTrash(data) {

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
            modificationListSecondChild.innerHTML += "<div class='container-modification'><div class='second-flex second-info'>" + foundModificationDate + "</div> <img class='trash-second-list-img'  src='images/trashIcon.png' alt='trash-image'></div>";
            const trashSecondListImg = document.querySelectorAll(".trash-second-list-img");
            for (let i = 0; i < trashSecondListImg.length; i++) {
                trashSecondListImg[i].addEventListener("click", cleanTrash);
            }




        }
    }

    /* fileContent.innerHTML = "Content: " + data["content"]; */
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