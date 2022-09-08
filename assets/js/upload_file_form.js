const
    uploadFileForm      = document.getElementById("uploadFileForm"),
    rootFolder          = document.getElementById("rootFolder"),
    folderManager       = document.getElementById("folderManager"),
    selectDirectory     = document.getElementById("selectDirectory"),
    folderElements      = document.querySelectorAll("#rootFolder li");

    
window.onload = createOptions();

function createOptions() {
    let foldersPath     = [],
        foldersName     = [];
    
    folderElements.forEach(e => {
        foldersPath.push(e.id);
        foldersPath.push(e.textContent);
    });
    
    for(let i = 0; i < foldersPath.length; i++) {
        let option = document.createElement("option");
        option.setAttribute('id', foldersPath[i]);
        option.textContent = foldersName[i];
        selectDirectory.appendChild(option);
    }
}




