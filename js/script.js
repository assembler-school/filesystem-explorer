
function uploadFile() {
  document.getElementById('uploadForm').submit();
}

function deleteAll(e) {
  e.preventDefault();
  fetch('./deleteAll.php')
    .then(res => res.json())
    .then(res => {
      console.log(res);
      if (res === 1) {
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
        custom_alert('Files deleted succesfully!', 'success');
      } else {
        custom_alert('No files', 'warning');
      }
    })
    .catch(function () {
      custom_alert("Can't connect to backend, try latter", 'danger');
    });
}

function deleteFile(e, fileName) {
  e.preventDefault();
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
      }
      custom_alert('File deleted succesfully!', 'success');
    })
    .catch(function () {
      custom_alert("Can't connect to backend, try latter", 'danger');
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
      custom_alert("Can't connect to backend, try latter", 'danger');
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
      custom_alert("Can't connect to backend, try latter", 'danger');
    });
}

