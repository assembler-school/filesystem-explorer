const deleteModal = document.getElementById("deleteModal");
const renameModal = document.getElementById("renameModal");

deleteModal.addEventListener("show.bs.modal", populateDeleteModal);
renameModal.addEventListener("show.bs.modal", populateRenameModal);

function populateDeleteModal(event) {
  const deleteButton = document.getElementById("deleteButton");
  const deleteFileName = document.getElementById("deleteFileName");
  let value = event.relatedTarget.value;
  deleteFileName.innerHTML = value;
  deleteButton.value = value;
}
function populateRenameModal(event) {
  const renameButton = document.getElementById("renameButton");
  const renameFileName = document.getElementById("renameFileName");
  let value = event.relatedTarget.value.split(".").slice(0, -1).join(".");
  renameFileName.innerHTML = value;
  renameButton.value = value;
}
