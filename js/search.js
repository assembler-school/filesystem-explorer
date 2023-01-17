const searchInput = document.querySelector("#searchInput");
const searchInputForm = document.querySelector("#searchInputForm");

searchInput.addEventListener("keyup", searchElements);

function searchElements() {
    if(lastList!=""){
        lastList.style.backgroundColor = "#D9D9D9";
    }
    pathSecondFolderTitle.textContent = "";
    sizeListSecondChild.innerHTML = "";
    modificationListSecondChild.innerHTML = "";
    filesListSecondChild.innerHTML = "";
    let searchValue = searchInput.value;
    if (searchValue != "") {
        fetch("modules/searchRecursive.php" + "?" + "search=" + searchValue, {
                method: "GET",
            })
            .then((response) => response.json())
            .then((data) => {
                if ("ok" in data) {
                    let arrayFiles = data.files;
                    let arrayFolders = data.folders;
                    let filesToPrint;
                    let foldersToPrint;
                    printFilesSearch(arrayFiles);
                    printFoldersSearch(arrayFolders);
                } else {
                    console.log("Something went wrong");
                }
            })
            .catch((err) => console.log("Request failed: ", err));
    }
}

function printFilesSearch(arrayFiles) {
    arrayFiles.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split(".");
        let fileExt = arrayName.slice(-1)[0];
        if (fileExt == "jpeg") {
            fileExt = "jpg";
        }
        let fileExtUpper = fileExt.toUpperCase();
        arrayName.join('.');
        filesToPrint = "<div class='first-list second-flex' data-path='" + newName + "' type='file'><img class='folder-second-list-img' src='images/" + fileExt + "Icon.png' alt='document icon'><span class='text-second-list'>" + arrayName + "</span><span class='extesion-file'>" + fileExtUpper + "</span></div>";
        filesListSecondChild.innerHTML += filesToPrint;
    })
}

function printFoldersSearch(arrayFolders) {
    arrayFolders.forEach(function (element) {
        let newName = element.slice(9);
        let arrayName = newName.split("/");
        let folderName = arrayName[arrayName.length-1];
        arrayName = arrayName.join("/");
        filesToPrint = "<div class='first-list second-flex' data-path='" + arrayName + "' type='folder'><img class='folder-second-list-img' src='images/folderIconSmallx2.png' alt='folder'><span class='text-second-list'>" + folderName + "</span>";
        filesListSecondChild.innerHTML += filesToPrint;
    })
}