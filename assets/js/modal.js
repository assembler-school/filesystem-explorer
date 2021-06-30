const shadow = document.querySelector(".modal-shadow");
const cancelBtn = document.getElementById("modalCancel");
const crossBtn = document.querySelector(".btn-x");
const closing = [shadow, cancelBtn, crossBtn];
const modal = document.querySelector(".modal-form");

const modalInput = document.getElementById("newFile");

document.getElementById("folderBtn")?.addEventListener("click", function () {
  modal.classList.toggle("modal-hidden");
  shadow.classList.toggle("modal-hidden");
  modalInput.select();
});

closing.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    modal.classList.toggle("modal-hidden");
    shadow.classList.toggle("modal-hidden");
    modalInput.value = "Unnamed folder";
    modalInput.select();
  });
});
