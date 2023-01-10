const createFolderBtn = document.querySelectorAll(".create-folder-btn");
const filesAndFoldersContainer = document.getElementsByTagName("main")[0];
const noFilerOrFoldersAlert = document.querySelector(
  ".empty-root-folder-alert"
);
const btnsContainer = document.querySelectorAll(".btns-container");

for (let btn of createFolderBtn) {
console.log(btn)
  btn.addEventListener("click", createFolder);
}

// let currentDirectory = "../root";

function createFolder(e) {
  currentDirectory = "." + e.target.getAttribute("path");
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
        console.log(data.path);
        const folder = document.createElement("div");
        folder.classList.add("folder-container");
        folder.innerHTML = `<div class='folder' path=${data.path} onclick="navigateToFolder(event)"></div>
                              <p>${data.dir}</p>`;

        filesAndFoldersContainer.insertAdjacentElement("beforeend", folder);
        noFilerOrFoldersAlert
          ? (noFilerOrFoldersAlert.style.display = "none")
          : null;

        for (let btnContainer of btnsContainer) {
          btnContainer.style.display = "flex";
        }
        // window.location.href = "./index.php";
      }
    })
    .catch((err) => console.log("Request: ", err));
}

function openRenameFolderInput(event) {
  console.log(event.target);
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
        console.log(data);
        currentDirectory = data.path;
        filesAndFoldersContainer.innerHTML = "";
        window.location.href = "./index.php";
      }
    })
    .catch((err) => console.log("Request: ", err));
}
