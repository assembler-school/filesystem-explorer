const btnDeleteFileTxt = document.querySelector("#delete-txt");
btnDeleteFileTxt.addEventListener("click", deleteFileTxt);


function deleteFileTxt(event){
    event.preventDefault();
    const popUpDeleteConfirm = confirm("Do you want delete this file?");
    if (popUpDeleteConfirm) {
        let filePath = event.srcElement.getAttribute("filePath");

    console.log(filePath)
   fetch("assets/delete-file.php?filePath="+filePath);
    window.location.replace("root");  
}
}
