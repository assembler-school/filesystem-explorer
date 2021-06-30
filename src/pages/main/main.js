function showFiles(folderId){
  window.location = `${window.location.pathname}?folder-id=${folderId}`;
}

document.getElementById("trash-id").addEventListener("click", showFilesTrash);

function showFilesTrash(){
  window.location = `${window.location.pathname}?trash=true`;
}

function createFolderHandler(){
  let state = document.getElementById("form-new-folder").style.display;
  if(state == "none") document.getElementById("form-new-folder").style.display = "block";
  else document.getElementById("form-new-folder").style.display = "none";
}