// UPLOAD /////////////////////////////////////////////////////////////////////////////

function uploadFile() {
  document.getElementById('uploadForm').submit();
}

// DELETE ALL AND TRASH ///////////////////////////////////////////////////////////////

function deleteAll(e, element) {
  e.preventDefault();
  fetch(`./deleteAll.php?el=${element}`)
    .then(res => res.json())
    .then(res => {
      if (res.folder == 'ok') {
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
        document.querySelector('#emptyAll').style.display = 'none';
        createEmptyRow(true);
        const openTrash = document.querySelector('#openTrash');
        openTrash.innerHTML = '';
        openTrash.innerHTML = '<i class="bi-battery-charging"></i> Open Trash';
        custom_alert('Files deleted succesfully from this folder!', 'success');
      } else if (res.folder == 'is-empty') {
        custom_alert('This folder is empty', 'warning');
      } else if (res.trash == 'ok') {
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
        document.querySelector('#emptyTrash').style.display = 'none';
        createEmptyRow(true);
        custom_alert('Files deleted succesfully from trash!', 'success');
      } else if (res.trash == 'is-empty') {
        custom_alert('The trash is empty', 'warning');
      }
    })
    .catch(function (err) {
      console.error(err);
      custom_alert(`Can't connect to backend!`, 'danger');
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
        const openTrash = document.querySelector('#openTrash');
        openTrash.innerHTML = '';
        openTrash.innerHTML = '<i class="bi-battery-charging"></i> Open Trash';
      }
      createEmptyRow(false);
      custom_alert('File deleted succesfully!', 'success');
    })
    .catch(function (err) {
      custom_alert(`Can't connect to backend!`, 'danger');
    });
}

// SEARCH //////////////////////////////////////////////////////////////////////////////////

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

      data_files.forEach(name => {
        resultFiles.forEach(nameResult => {
          if (name == nameResult) {
            data_files = arrayRemove(data_files, name);
          }
        });
      });
      files.forEach(node => {
        if (data_files.find(name => name.toUpperCase() == node.getAttribute('data-file').toUpperCase())) {
          node.style.display = 'none';
        } else {
          node.style.display = 'revert';
        }
      });
    })
    .catch(function (err) {
      custom_alert(`Can't connect to backend!`, 'danger');
    });

  function arrayRemove(arr, value) {
    return arr.filter(function (ele) {
      return ele != value;
    });
  }
}

function advancedSearch(e) {
  e.preventDefault();
  const searchValue = searchBar.value;
  searchBar.value = '';
  const searchData = new FormData();
  searchData.append('search', searchValue);
  const fileExtensionsAllowed = ['jpg', 'png', 'txt', 'docx', 'csv', 'ppt', 'odt', 'pdf', 'zip', 'rar', 'exe', 'svg', 'mp3', 'mp4', '0'];

  fetch("./advancedSearch.php", { 'method': 'POST', 'body': searchData })
    .then(res => res.json())
    .then(resultFiles => {
      const tbody = document.querySelector('#tbody');
      tbody.innerHTML = '';
      resultFiles.forEach(file => {
        const array = file.split('\\');
        const name = array[array.length - 1];
        const data = new FormData();
        data.append('name', name);
        data.append('path', file)
        fetch("./getSearchFiles.php", { 'method': 'POST', 'body': data })
          .then(res => res.json())
          .then(files => {
            console.log(files);
            let array = name.split('.');
            let extension = array[array.length - 1];
            let icon = '';
            if (fileExtensionsAllowed.includes(extension)) {
              icon = extension;
            } else icon = 'other';

            if (files.type === 'dir') {
              icon = 'dir';
              href = '?search&p=';
            } else href = 'open.php?search&path=';
            tbody.innerHTML += `<tr><td class="p-3"><img src='./assets/${icon}.png' class='icon me-2' alt='$fileExtension' />
            ${name}</td><td class="p-3">${files.size}</td><td class="p-3">${files.time}</td>
            <td class="p-3"><a class="folder-btn link text-white" target="_blank" href="${href}${files.relative}&name=${name}"><i class="bi bi-door-open"></i>
            </a></td></tr>`;
          });
      });
    })
    .catch(function (err) {
      custom_alert(`Can't connect to backend!`, 'danger');
    });

}

// RENAME //////////////////////////////////////////////////////////////////////////////////////////////////

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
    .then(async res => {
      const name = res;
      changeName(oldName, name);
      custom_alert("The name has been changed successfully", "success");
    })
    .catch(function (err) {
      console.error(err);
      custom_alert(`Can't connect to backend!`, 'danger');
    });

  function changeName(oldName, newName) {
    const modify = document.querySelector(`tr[data-file='${oldName}']`);
    modify.removeAttribute("data-file");
    modify.setAttribute("data-file", newName);
    const link = modify.children[0].children[1];
    link.textContent = newName;
    let href = link.href.split("=")[0];
    href += `=${newName}`;
    href = href.replace(' ', '%20');
    link.href = href;
  }
}

// MOVE ///////////////////////////////////////////////////////////////////////////////////////

function copyFile(e) {
  e.preventDefault();
  const fileName = e.target.parentNode.getAttribute("data-file");
  const file = new FormData();
  file.append('name', fileName);
  file.append('action', 'copy');
  const config = {
    'method': 'POST',
    'body': file,
  }

  fetch("./copy_path.php", config)
    .then(res => res.json())
    .then(res => {
      addCopyAction(e);
    })
    .catch(function (err) {
      custom_alert(`Can't connect to backend!`, 'danger');
    });
}

function moveFile(e) {
  e.preventDefault();
  const fileName = e.target.parentNode.getAttribute("data-file");
  const file = new FormData();
  file.append('name', fileName);
  file.append('action', 'move');
  const config = {
    'method': 'POST',
    'body': file,
  }

  fetch("./copy_path.php", config)
    .then(res => res.json())
    .then(res => {
      addMoveAction(e);
    })
    .catch(function (err) {
      console.error(err);
      custom_alert(`Can't connect to backend!`, 'danger');
    });
}

// RECOVER TRASH //////////////////////////////////////////////////////////////////////////

function recoverFile(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.parentNode.parentNode.getAttribute('data-file');
  } else {
    name = e.target.parentNode.parentNode.getAttribute('data-file');
  }

  fetch(`./recover.php?filename=${name}`)
    .then(res => res.json())
    .then(() => {
      document.querySelector(`tr[data-file="${name}"]`).remove();
      createEmptyRow(false);
      custom_alert(`The file has been recovered!`, 'success');
    })
    .catch(function (err) {
      console.error(err);
      custom_alert(`Can't connect to backend!`, 'danger');
    });
}

function createEmptyRow(isEmpty) {
  if (isEmpty) {
    createRow();
  } else {
    if (document.querySelectorAll('tr[data-file]').length === 0) {
      createRow();
    }
  }

  function createRow() {
    const tr = document.createElement('tr');
    let td = document.createElement('td');
    td.textContent = 'No files were found';
    td.classList.add('fw-bold');
    td.classList.add('p-3');
    tr.append(td);
    tr.innerHTML += '<td></td><td></td><td></td>';
    const tbody = document.querySelector('#tbody');
    tbody.append(tr);
  }
}

