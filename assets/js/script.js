const deleteModal = document.getElementById("deleteModal");

deleteModal.addEventListener("show.bs.modal", populateDeleteModal);

function populateDeleteModal(event) {
  const deleteButton = document.getElementById("deleteButton");
  const deleteFileName = document.getElementById("deleteFileName");
  let value = event.relatedTarget.value;
  deleteFileName.innerHTML = value;
  deleteButton.value = value;
}
