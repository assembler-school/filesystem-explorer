const btnDeleteFileTxt = document.querySelector("#delete-txt");
btnDeleteFileTxt.addEventListener("click", deleteFileTxt);


function deleteFileTxt(event){
    event.preventDefault();
    const popUpDeleteConfirm = confirm("Do you want delete this file?");
    let filePath;

    if (popUpDeleteConfirm) {
        filePath = event.srcElement.getAttribute("filePath");
        console.log(filePath)

   fetch("assets/add-trash.php?filePath="+filePath);
    window.location.replace("root");  
}
}

const btnSaveChangedFileTxt = document.querySelector("#modify-file");
btnSaveChangedFileTxt.addEventListener("click", saveModifiedFile);

function saveModifiedFile(){
    const confirmModify = confirm("Do you want save changes?");
    if(confirmModify){
        alert("Your changes were saved successful!");
    }
}






