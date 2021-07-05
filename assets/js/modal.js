const shadow = document.getElementById("shadowFolder");
const cancelBtn = document.getElementById("modalFolderCancel");
const crossBtn = document.querySelector("#formFolder .btn-x");
const closing = [shadow, cancelBtn, crossBtn];
const modal = document.getElementById("formFolder");

const modalInput = document.getElementById("newFile");

document.getElementById("folderBtn").addEventListener("click", function () {
  modal.classList.toggle("hidden");
  shadow.classList.toggle("hidden");
  modalInput.select();
});

closing.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    modal.classList.toggle("hidden");
    shadow.classList.toggle("hidden");
    modalInput.value = "Unnamed folder";
    modalInput.select();
  });
});
