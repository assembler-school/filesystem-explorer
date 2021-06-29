const files = document.querySelectorAll(".file");
const folders = document.querySelectorAll(".folder");

function customContextMenu(e) {
  e.preventDefault();
  let menu = document.getElementById("customContextMenu");
  let options = Array.from(document.querySelectorAll("#customContextMenu li"));

  options.map(function (option) {
    option.setAttribute("data-title", e.target.title);
  });

  if (window.innerWidth - 150 < e.clientX) {
    menu.style.left = e.clientX - 150 + "px";
  } else {
    menu.style.left = e.clientX + "px";
  }

  if (window.innerHeight - 180 < e.clientY) {
    menu.style.top = e.clientY - 180 + "px";
  } else {
    menu.style.top = e.clientY + "px";
  }

  function removeMenu() {
    menu.classList.toggle("hidden");
    document.querySelector("body").removeEventListener("click", removeMenu);
  }

  document.querySelector("body").addEventListener("click", removeMenu);

  menu.classList.toggle("hidden");
}

files.forEach(function (file) {
  file.addEventListener("contextmenu", customContextMenu);
});

folders.forEach(function (folder) {
  folder.addEventListener("contextmenu", customContextMenu);
});

/* Rename modal */
const rShadow = document.getElementById("shadowRename");
const rCancelBtn = document.getElementById("modalRenameCancel");
const rCrossBtn = document.querySelector("#formRename .btn-x");
const rClosing = [rShadow, rCancelBtn, rCrossBtn];
const rModal = document.getElementById("formRename");

const modalRenameInput = document.getElementById("renameInput");
const oldNameInput = document.getElementById("oldNameInput");

document.getElementById("renameOption").addEventListener("click", function (e) {
  rModal.classList.toggle("hidden");
  rShadow.classList.toggle("hidden");
  modalRenameInput.value = e.target.getAttribute("data-title");
  oldNameInput.value = e.target.getAttribute("data-title");
  modalRenameInput.select();
});

rClosing.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    rModal.classList.toggle("hidden");
    rShadow.classList.toggle("hidden");
    modalRenameInput.value = e.target.getAttribute("data-title");
    modalRenameInput.select();
  });
});
