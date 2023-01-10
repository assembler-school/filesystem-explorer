const createFolderBtn = document.getElementById("createFolderBtn");
const filesAndFoldersContainer = document.getElementsByTagName("main")[0];
const noFilerOrFoldersAlert = document.querySelector(
  ".empty-root-folder-alert"
);

createFolderBtn.addEventListener("click", createFolder);

let currentDirectory = "../root";

function createFolder() {
  fetch(`./modules/createFolder.php?path=${currentDirectory}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.ok) {
        const folder = document.createElement("div");
        folder.classList.add("folder-container");
        folder.innerHTML = `<div class='folder'></div>
                              <p>${data.dir}</p>`;

        folder.setAttribute("path", data.path);

        filesAndFoldersContainer.insertAdjacentElement("beforeend", folder);
        noFilerOrFoldersAlert.style.display = "none";
      }
    })
    .catch((err) => console.log("Request: ", err));
}

function openRenameFolderInput(event) {
  console.log(event.target);
}

function navigateToFolder(event) {
  const path = event.target.getAttribute("path");

  fetch(`./modules/savePathToSession.php?path=${path}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.ok) {
        currentDirectory = data.path;
        filesAndFoldersContainer.innerHTML = "";
        window.location.href = './index.php'
      }
    })
    .catch((err) => console.log("Request: ", err));
}
