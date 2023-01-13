
function uploadFile() {
  document.getElementById('uploadForm').submit();
}

function deleteAll(e, element) {
  e.preventDefault();
  fetch(`./deleteAll.php?el=${element}`)
    .then(res => res.json())
    .then(res => {
      if (res === 1) {
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
        custom_alert('Files deleted succesfully!', 'success');
      } else if (res === 2) {
        custom_alert('The trash is empty', 'success');
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
  const newName = rename.value;
  const oldName = document.querySelector("#renameTitle").getAttribute("data-file");
  const file = new FormData();
  file.append("newName", newName);
  file.append("oldName", oldName);
  const config = {
    'method': 'POST',
    'body': file,
  }
  fetch("./rename.php", config)
  .then(res => res.json())
  .then(res => {
    console.log(res);
    if(res == 1){
      const completeName = newName + "." + oldName.split(".")[1];
      const modify = document.querySelector(`tr[data-file='${oldName}']`);
      modify.removeAttribute("data-file");
      modify.setAttribute("data-file",completeName);
      const link = modify.children[0].children[1];
      link.textContent = completeName;
      let href = link.href.split("=")[0];
      href += `=${completeName}`;
      console.log(href);
      link.href = href;
      custom_alert("The name has been changed successfully", "success");

      
    }else{
      custom_alert("Can´t rename the file", 'danger');
    }
      
    })
    .catch(function () {
      custom_alert("Can't connect to backend, try latter", 'danger');
    });
}

