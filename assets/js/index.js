const createFolderBtn = document.getElementById('createFolderBtn');

createFolderBtn.addEventListener('click', () => {
    // window.location.href = '../filesystem-explorer/modules/createFolder.php';
    fetch("../modules/creteFolder.php", {
      method: "GET",
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((err) => console.log("Request failed: ", err));
})