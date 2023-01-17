const searchInputForm = document.querySelector("#searchInputForm");
const documentsMedia = document.querySelector("#documentsMedia");
const imagesMedia = document.querySelector("#imagesMedia");
const videosMedia = document.querySelector("#videosMedia");
const audiosMedia = document.querySelector("#audiosMedia");
const searchInput = document.querySelector("#searchInput");
let searchValue;

searchInput.addEventListener("keyup", searchElements);
imagesMedia.addEventListener("click", showImagesMedia);
videosMedia.addEventListener("click", showVideosMedia);
audiosMedia.addEventListener("click", showAudiosMedia);
documentsMedia.addEventListener("click", showDocumentsMedia);

function searchElements() {
    if (lastList != "") {
        lastList.style.backgroundColor = "#D9D9D9";
    }
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    searchValue = searchInput.value;
    if (searchValue != "") {
        fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                method: "GET",
            })
            .then((response) => response.json())
            .then((data) => {
                if ("ok" in data) {
                    let arrayFiles = data.files;
                    let arrayFolders = data.folders;
                    let arrayFilesTrash = data.filesTrash;
                    let arrayFoldersTrash = data.foldersTrash;
                    printFilesSearch(arrayFiles);
                    printFoldersSearch(arrayFolders);
                    printFilesSearchTrash(arrayFilesTrash);
                    printFoldersSearchTrash(arrayFoldersTrash);
                } else {
                    console.log("Something went wrong");
                }
            })
            .catch((err) => console.log("Request failed: ", err));
    }
}

function printFilesSearch(arrayFiles) {
    let filesToPrint;
    arrayFiles.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split(".");
        let fileExt = arrayName.slice(-1)[0];
        if (fileExt == "jpeg") {
            fileExt = "jpg";
        }
        let fileExtUpper = fileExt.toUpperCase();
        let arrayNameJoined = arrayName.join('.');
        filesToPrint = "<div class='first-list second-flex' data-path='" + newName + "' type='file'><img class='folder-second-list-img' src='images/" + fileExt + "Icon.png' alt='document icon'><span class='text-second-list'>" + arrayNameJoined + "</span><span class='extesion-file'>" + fileExtUpper + "</span></div>";
        filesListSecondChild.innerHTML += filesToPrint;
        datapath = arrayNameJoined;
        getInfoFilesSecondSearch();
    })
}

function printFoldersSearch(arrayFolders) {
    let filesToPrint;
    arrayFolders.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split("/");
        let folderName = arrayName[arrayName.length - 1];
        let arrayNameJoined = arrayName.join("/") + "/";
        filesToPrint = "<div class='first-list second-flex' data-path='" + arrayNameJoined + "' type='folder'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>" + folderName + "</span>";
        filesListSecondChild.innerHTML += filesToPrint;
        datapath = arrayNameJoined;
        getInfoFilesSecondSearch();
    })
}

function printFilesSearchTrash(arrayFiles) {
    let filesToPrint;
    arrayFiles.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split(".");
        let fileExt = arrayName.slice(-1)[0];
        if (fileExt == "jpeg") {
            fileExt = "jpg";
        }
        let fileExtUpper = fileExt.toUpperCase();
        let arrayNameJoined = arrayName.join('.');
        filesToPrint = "<div class='first-list second-flex search-trash' data-path='" + newName + "' type='file'><img class='folder-second-list-img' src='images/" + fileExt + "Icon.png' alt='document icon'><span class='text-second-list'>" + arrayNameJoined + "</span><span class='extesion-file'>" + fileExtUpper + "</span></div>";
        filesListSecondChild.innerHTML += filesToPrint;
        datapath = arrayNameJoined;
        getInfoFilesSecondSearch();
    })
}

function printFoldersSearchTrash(arrayFolders) {
    let filesToPrint;
    arrayFolders.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split("/");
        let folderName = arrayName[arrayName.length - 1];
        let arrayNameJoined = arrayName.join("/") + "/";
        filesToPrint = "<div class='first-list second-flex search-trash' data-path='" + arrayNameJoined + "' type='folder'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>" + folderName + "</span>";
        filesListSecondChild.innerHTML += filesToPrint;
        datapath = arrayNameJoined;
        getInfoFilesSecondSearch();
    })
}

function getInfoFilesSecondSearch() {
    let dataPathWithoutSlash = dataPath.substring(0, dataPath.length - 1);
    fetch("modules/fileInfo.php" + "?" + "path=" + dataPathWithoutSlash, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            if (data != "Error in opening file") {
                let sizeOnly = renderDataSecondListSearchSize(data);
                let modificationOnlyFile = renderDataSecondListSearchModification(data);
                sizeListSecondChild.innerHTML += sizeOnly;
                modificationListSecondChild.innerHTML += modificationOnlyFile;
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}

function renderDataSecondListSearchSize(data) {
    if (data["size"] > 1000) {
        sizeInfo.innerHTML = "Size: " + Math.round(data["size"] / 1024) + "Mb";
        let sizeOnlyVar = Math.round(data["size"] / 1024) + "Mb";
        return sizeOnly = "<div class='second-flex second-info'>" + sizeOnlyVar + "</div>";
    } else {
        sizeInfo.innerHTML = "Size: " + data["size"] + "Kb";
        let sizeOnlyVar = data["size"] + "Kb";
        return sizeOnly = "<div class='second-flex second-info'>" + sizeOnlyVar + "</div>";
    }
}

function renderDataSecondListSearchModification(data) {
    return modificationOnlyFile = "<div class='second-flex second-info'>" + data["modificationDate"] + "</div>";
}

function showImagesMedia() {
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    let arrayImageFormats = ["jpg", "jpeg", "svg", "png"];
    arrayImageFormats.forEach(function (element) {
        searchInput.value = element;
        if (lastList != "") {
            lastList.style.backgroundColor = "#D9D9D9";
        }
        searchValue = searchInput.value;
        if (searchValue != "") {
            fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    if ("ok" in data) {
                        let arrayFiles = data.files;
                        let arrayFolders = data.folders;
                        let arrayFilesTrash = data.filesTrash;
                        let arrayFoldersTrash = data.foldersTrash;
                        printFilesSearch(arrayFiles);
                        printFoldersSearch(arrayFolders);
                        printFilesSearchTrash(arrayFilesTrash);
                        printFoldersSearchTrash(arrayFoldersTrash);
                    } else {
                        console.log("Something went wrong");
                    }
                })
                .catch((err) => console.log("Request failed: ", err));
        }
    })
    searchInput.value = "";
}

function showVideosMedia() {
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    let arrayVideoFormats = ["mp4"];
    arrayVideoFormats.forEach(function (element) {
        searchInput.value = element;
        if (lastList != "") {
            lastList.style.backgroundColor = "#D9D9D9";
        }
        searchValue = searchInput.value;
        if (searchValue != "") {
            fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    if ("ok" in data) {
                        let arrayFiles = data.files;
                        let arrayFolders = data.folders;
                        let arrayFilesTrash = data.filesTrash;
                        let arrayFoldersTrash = data.foldersTrash;
                        printFilesSearch(arrayFiles);
                        printFoldersSearch(arrayFolders);
                        printFilesSearchTrash(arrayFilesTrash);
                        printFoldersSearchTrash(arrayFoldersTrash);
                    } else {
                        console.log("Something went wrong");
                    }
                })
                .catch((err) => console.log("Request failed: ", err));
        }
    })
    searchInput.value = "";
}

function showAudiosMedia() {
    let arrayAudioFormats = ["mp3"];
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    arrayAudioFormats.forEach(function (element) {
        searchInput.value = element;
        if (lastList != "") {
            lastList.style.backgroundColor = "#D9D9D9";
        }
        searchValue = searchInput.value;
        if (searchValue != "") {
            fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    if ("ok" in data) {
                        let arrayFiles = data.files;
                        let arrayFolders = data.folders;
                        let arrayFilesTrash = data.filesTrash;
                        let arrayFoldersTrash = data.foldersTrash;
                        printFilesSearch(arrayFiles);
                        printFoldersSearch(arrayFolders);
                        printFilesSearchTrash(arrayFilesTrash);
                        printFoldersSearchTrash(arrayFoldersTrash);
                    } else {
                        console.log("Something went wrong");
                    }
                })
                .catch((err) => console.log("Request failed: ", err));
        }
    })
    searchInput.value = "";
}

function showDocumentsMedia() {
    let arrayVideoFormats = ["doc", "csv", "txt", "odt", "pdf"];
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    arrayVideoFormats.forEach(function (element) {
        searchInput.value = element;
        if (lastList != "") {
            lastList.style.backgroundColor = "#D9D9D9";
        }
        searchValue = searchInput.value;
        if (searchValue != "") {
            fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                    method: "GET",
                })
                .then((response) => response.json())
                .then((data) => {
                    if ("ok" in data) {
                        let arrayFiles = data.files;
                        let arrayFolders = data.folders;
                        let arrayFilesTrash = data.filesTrash;
                        let arrayFoldersTrash = data.foldersTrash;
                        printFilesSearch(arrayFiles);
                        printFoldersSearch(arrayFolders);
                        printFilesSearchTrash(arrayFilesTrash);
                        printFoldersSearchTrash(arrayFoldersTrash);
                    } else {
                        console.log("Something went wrong");
                    }
                })
                .catch((err) => console.log("Request failed: ", err));
        }
    })
    searchInput.value = "";
}