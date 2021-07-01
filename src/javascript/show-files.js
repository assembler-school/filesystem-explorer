// Show files according to the folder selected.
for (let i = 0; i < document.getElementsByClassName("item-showfiles").length; i++) {
  document.getElementsByClassName("item-showfiles")[i].addEventListener("click", function () {
    let folderId = this.getAttribute("value");
    window.location = `${window.location.pathname}?folder-id=${folderId}`;
  });
}

// Show files in the trash.
document.getElementById("trash-id").addEventListener("click", function () {
  window.location = `${window.location.pathname}?trash=true`;
});