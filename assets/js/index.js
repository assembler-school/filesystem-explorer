const createFolderBtn = document.querySelectorAll(".create-folder-btn");
const filesAndFoldersContainer = document.getElementsByTagName("main")[0];
const noFilerOrFoldersAlert = document.querySelector(
  ".empty-root-folder-alert"
);
const btnsContainer = document.querySelectorAll(".btns-container");
const menu = document.querySelector(".menu");
const deleteBtn = document.querySelector("#delete-btn");
const renameBtn = document.querySelector("#rename-btn");

let pathToDelete;
let currentFolder;

for (let btn of createFolderBtn) {
  console.log(btn);
  btn.addEventListener("click", createFolder);
}

document.body.addEventListener("click", closeMenu);
deleteBtn.addEventListener("click", deleteDir);
renameBtn.addEventListener("click", renameDirFromMenu);

function createFolder(e) {
  currentDirectory = "." + e.target.getAttribute("path");
  console.log(currentDirectory);
  filePath = e.target.getAttribute("path");
  fetch(
    `./modules/createFolder.php?path=${currentDirectory}&filepath=${filePath}`,
    {
      method: "GET",
    }
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.ok) {
        const folder = document.createElement("div");
        folder.classList.add("folder-container");
        folder.innerHTML = `<div class='folder' path=${data.path} onclick="navigateToFolder(event)" oncontextmenu='openMenu(event)'"></div>
                              <p onclick='openRenameFolderInput(event)'>${data.dir}</p>`;

        filesAndFoldersContainer.insertAdjacentElement("beforeend", folder);
        noFilerOrFoldersAlert
          ? (noFilerOrFoldersAlert.style.display = "none")
          : null;

        for (let btnContainer of btnsContainer) {
          btnContainer.style.display = "flex";
        }
      }
    })
    .catch((err) => console.log("Request: ", err));
}

function openRenameFolderInput(event) {
  let folderName = event.target;
  let text = event.target.innerText;
  let folderContainer = folderName.parentElement;
  let input = document.createElement("input");
  input.classList.add('rename-input')

  input.type = "text";
  input.value = text;
  input.classList.add("rename-input");
  input.addEventListener("focusout", rename);
  folderContainer.removeChild(folderName);
  folderContainer.appendChild(input);
  input.focus();
}

function navigateToFolder(event) {
  console.log(event.target.getAttribute("path"));
  let path = event.target.getAttribute("path");
  console.log(path);
  fetch(`./modules/savePathToSession.php?path=${path}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.ok) {
        currentDirectory = data.path;
        filesAndFoldersContainer.innerHTML = "";
        window.location.href = "./index.php";
      }
    })
    .catch((err) => console.log("Request: ", err));
  // window.location.href = `./modules/savePathToSession.php?path=${path}`
}

function rename(e) {
  let newText = e.target.value;
  let folder = e.target.parentElement.children[0];
  let path = folder.getAttribute("path");

  fetch(`./modules/renameFolder.php?path=${path}&text=${newText}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data.newPath);
      if (data.ok) {
        let folderContainer = folder.parentElement;
        let input = folderContainer.children[1];

        let folderName = document.createElement("p");
        folderName.innerText = input.value;
        folderName.addEventListener("click", openRenameFolderInput);

        folderContainer.removeChild(input);
        folderContainer.appendChild(folderName);

        folder.setAttribute("path", data.newPath);
      }
    })
    .catch((err) => console.log("Request: ", err));
  // window.location.href = `./modules/renameFolder.php?path=${path}&text=${newText}`;
}

function openMenu(event) {
  pathToDelete = event.target.getAttribute("path");
  currentFolder = event.target;
  menu.classList.remove("hidden");
  menu.style.left = event.pageX - 10 + "px";
  menu.style.top = event.pageY - 10 + "px";
}

function closeMenu() {
  menu.classList.add("hidden");
}

function deleteDir() {
  fetch(`./modules/deleteDir.php?path=${pathToDelete}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.ok) {
        filesAndFoldersContainer.removeChild(currentFolder.parentElement);
      }
    })
    .catch((err) => console.log("Request: ", err));

  // window.location.href = `./modules/deleteDir.php?path=${pathToDelete}`;
}

function renameDirFromMenu() {
  let folderName = currentFolder.parentElement.children[1];

  let text = folderName.innerText;
  let folderContainer = currentFolder.parentElement;
  
  let input = document.createElement("input");
  input.classList.add('rename-input')
  input.type = "text";
  input.value = text;
  input.classList.add("rename-input");
  input.addEventListener("focusout", rename);

  folderContainer.removeChild(folderName);
  folderContainer.appendChild(input);
  
  input.focus();
}
