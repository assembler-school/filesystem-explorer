const createFolderBtn = document.getElementById("createFolderBtn");

createFolderBtn.addEventListener("click", () => {
  fetch("./modules/createFolder.php", {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((err) => console.log("Request failed: ", err));
});
