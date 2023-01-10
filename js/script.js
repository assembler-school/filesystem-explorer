const addFolderImage = document.querySelector("#addFolderImage");
let nameDirectory = "";

addFolderImage.addEventListener("click", showPopUpCreateFolder);

function showPopUpCreateFolder(){

}

function createFolder() {
    fetch("modules/createFolder.php" + "?" + "directoryName=" + nameDirectory, {
            method: "GET",
        })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            renderFileInfo(data);
        })
        .catch((err) => console.log("Request failed: ", err));
}