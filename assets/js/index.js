const createFolderBtn = document.querySelectorAll(".create-folder-btn");
const filesAndFoldersContainer = document.getElementsByTagName("main")[0];
const noFilerOrFoldersAlert = document.querySelector(
  ".empty-root-folder-alert"
);
const btnsContainer = document.querySelectorAll(".btns-container");

for (let btn of createFolderBtn) {
  console.log(btn);
  btn.addEventListener("click", createFolder);
}

// let currentDirectory = "../root";

function createFolder(e) {
  currentDirectory = "." + e.target.getAttribute("path");
  filePath = e.target.getAttribute("path");
  console.log(currentDirectory)
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
        folder.innerHTML = `<div class='folder' path=${data.path} onclick="navigateToFolder(event)"></div>
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

  input.type = "text";
  input.value = text;
  input.classList.add("rename-input");
  input.addEventListener("focusout", rename);
  folderContainer.removeChild(folderName);
  folderContainer.appendChild(input);
  input.focus();
}

function navigateToFolder(event) {
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
      console.log(data.newPath)
      if (data.ok) {
        folder.setAttribute("path", data.newPath);
      }
    })
    .catch((err) => console.log("Request: ", err));
  // window.location.href = `./modules/renameFolder.php?path=${path}&text=${newText}`;
}
