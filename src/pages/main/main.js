function showFiles(folderId){
  window.location = `${window.location.pathname}?folder-id=${folderId}`;
}

document.getElementById("trash-id").addEventListener("click", showFilesTrash);

function showFilesTrash(){
  window.location = `${window.location.pathname}?trash=true`;
}