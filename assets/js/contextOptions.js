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

/* Delete modal */
const dShadow = document.getElementById("shadowDelete");
const dCancelBtn = document.getElementById("modalDeleteCancel");
const dCrossBtn = document.querySelector("#formDelete .btn-x");
const dClosing = [dShadow, dCancelBtn, dCrossBtn];
const dModal = document.getElementById("formDelete");

document.getElementById("deleteOption").addEventListener("click", function (e) {
  dModal.classList.toggle("hidden");
  dShadow.classList.toggle("hidden");
  document.getElementById("deleteNameInput").value =
    e.target.getAttribute("data-title");
});

dClosing.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    dModal.classList.toggle("hidden");
    dShadow.classList.toggle("hidden");
  });
});

/* Download event listener */
document
  .getElementById("downloadOption")
  .addEventListener("click", function (e) {
    const data = e.target.getAttribute("data-title");
    window.location.replace("./src/download.php?data=" + data);
  });

/* Details modal */
const dtShadow = document.getElementById("shadowDetails");
const dtCrossBtn = document.querySelector("#formDetails .btn-x");
const dtClosing = [dtShadow, dtCrossBtn];
const dtModal = document.getElementById("formDetails");

document
  .getElementById("propertiesOption")
  .addEventListener("click", function (e) {
    dtModal.classList.toggle("hidden");
    dtShadow.classList.toggle("hidden");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("detailsContainer").innerHTML =
          this.responseText;
      }
    };
    xmlhttp.open(
      "GET",
      "src/details.php?n=" + e.target.getAttribute("data-title"),
      true
    );
    xmlhttp.send();
  });

dtClosing.forEach((element) => {
  element.addEventListener("click", function (e) {
    e.preventDefault();
    dtModal.classList.toggle("hidden");
    dtShadow.classList.toggle("hidden");
  });
});
