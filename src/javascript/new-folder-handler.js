// Creation of new folder handler.
function createFolderHandler() {
  let formNewFolder = document.getElementById("form-new-folder");
  let state = formNewFolder.style.display;
  if (state == "none") formNewFolder.style.display = "block";
  else formNewFolder.style.display = "none";
}
document.getElementById("create-folder-btn").addEventListener("click", createFolderHandler);
document.getElementById("cancel-form-new-folder").addEventListener("click", createFolderHandler);