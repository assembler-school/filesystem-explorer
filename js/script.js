
function uploadFile() {
  document.getElementById('uploadForm').submit();
}

function deleteAll(e) {
  e.preventDefault();

  fetch('./deleteAll.php')
    .then(res => res.json())
    .then(res => {
      if (res === 'ok') {
        alert("Deleting files");
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
      } else {
        alert("No files");
      }
    })
    .catch(function () {
      alert("Can't connect to backend try latter");
    });
}

function deleteFile(e) {
  e.preventDefault();
  const fileName = e.target.parentNode.parentNode.getAttribute('data-file');
  const file = new FormData();
  file.append("fileName", fileName);
  const config = {
    'method': 'POST',
    'body': file,
  }

  fetch(`./delete.php`, config)
    .then(res => res.json())
    .then(res => {
      if (res === 'ok') {
        document.querySelector(`[data-file='${fileName}']`).remove();
        alert("Deleting files");
      }
    })
    .catch(function () {
      alert("Can't connect to backend try latter");
    });
}

function searchFile(e) {
  e.preventDefault();
  const searchValue = searchBar.value

  const searchData = new FormData();
  searchData.append('search', searchValue)
  fetch("./search.php",
    {
      'method': 'POST',
      'body': searchData
    })
    .then(res => res.json())
    .then(res => {
      console.log(res)
    })
    .catch(function () {
      alert("Can't connect to backend try latter");
    });
}

function renameFile(e) {
  e.preventDefault();
  const fileName = e.target.parentNode.parentNode.getAttribute('data-file');
  const file = new FormData();
  file.append("fileName", fileName);
  const config = {
    'method': 'POST',
    'body': file,
  }
  console.log(fileName);
  fetch("./rename.php", config)
    .then(res => res.json())
    .then(res => {
      if (res === 'ok') {


      }
    })
    .catch(function () {
      alert("Can't connect to backend try latter");
    });
}