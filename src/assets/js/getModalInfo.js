const deleteModal = document.getElementById('deleteFileModal');
const renameModal = document.getElementById('renameFolderModal');
console.log("Enter on getModalInfo");

deleteModal.addEventListener('show.bs.modal', function (e) {
  modalFilePath = e.relatedTarget.getAttribute('data-delete');
  const deleteLink = document.getElementById('deleteLink');
  deleteLink.href = "./src/modules/deleting_file.php?filePath=" + modalFilePath;
})

renameModal.addEventListener('show.bs.modal', function (e) {
  modalFolderPath = e.relatedTarget.getAttribute('data-edit');
  const renameButton = document.getElementById('btnRenameFolder');
  renameButton.value = modalFolderPath;
})


