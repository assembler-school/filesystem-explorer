
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
  const searchValue = e.target.value;

  const searchData = new FormData();
  searchData.append('search', searchValue)
  fetch("./search.php",
    {
      'method': 'POST',
      'body': searchData
    })
    .then(res => res.json())
    .then(resultFiles => {
      let data_files = [];
      const files = document.querySelectorAll(`tr[data-file]`);
      files.forEach(node => {
        data_files.push(node.getAttribute('data-file'));
      });
      console.log("Resultados:  " + resultFiles);
      //console.log("Nodos en pantalla:  " + data_files);

      data_files.forEach(name => {
        resultFiles.forEach(nameResult => {
          if (name == nameResult) {
            data_files = arrayRemove(data_files, name);
          }
        });
      });
      //console.log("Nodos para eliminar:  " + data_files);
      files.forEach(node => {
        if (data_files.find(name => name.toUpperCase() == node.getAttribute('data-file').toUpperCase())) {
          node.style.display = 'none';
        } else {
          node.style.display = 'revert';
        }
      });

    })
    .catch(function () {
      custom_alert("Can't connect to backend, try latter", 'danger');
    });

  function arrayRemove(arr, value) {
    return arr.filter(function (ele) {
      return ele != value;
    });
  }

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

