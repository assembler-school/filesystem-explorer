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
