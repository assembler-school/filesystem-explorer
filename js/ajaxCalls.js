// UPLOAD /////////////////////////////////////////////////////////////////////////////

function uploadFile() {
  document.getElementById('uploadForm').submit();
}

// CREATE /////////////////////////////////////////////////////////////////////////////

function createFile(e) {
  e.preventDefault();
  const newType = fileType.value;
  const completeFile = nameCreated.value + fileType.value;  //Nuevo documento de texto.txt
  const fileNameHref = completeFile.replace(' ', '%20');
  const createData = new FormData();
  createData.append('name', completeFile)
  createData.append('type', newType)

  fetch("./create.php", {
    'method': 'POST',
    'body': createData,
  })
    .then(res => res.json())
    .then(res => {
      console.log(res);
      const tbody = document.querySelector('#tbody');
      if (newType === '.txt') {
        tbody.innerHTML += `<tr data-file='${completeFile}'><td class="p-3"><img src='./assets/txt.png' class='icon me-2' 
        alt='txt' data-change/><a class="link text-white" href="open.php?name=${fileNameHref}" data-change>${completeFile}</a></td>
        <td class="p-3"><p data-change></p></td><td class="p-3"><p data-change></p></td><td class="p-3" data-file="${completeFile}" 
        data-type="file"><button type="button" class="border border-0 bg-transparent me-1" data-bs-toggle="modal" data-bs-target="#renameModal"
        onclick="renameFileModal(event);" id="renameFunction" style="visibility:visible"><i class="bi bi-pencil text-white" data-change></i>
        </button><form onsubmit="copyFile(event);" id="copyFunction" style="visibility:visible"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-clipboard text-white" id="copyIcon" data-change></i></button></form><form onsubmit="moveFile(event)" id="moveFunction" 
        style="visibility: visible"><button type="submit" class="border border-0 bg-transparent me-1"><i class="bi bi-scissors text-white" id="moveIcon" data-change></i>
        </button></form><form style="visibility: hidden" class="me-2"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-file-earmark-zip text-white me-2" data-change></i></button></form><button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal"
        onclick="deleteFileModal(event);" id="deleteFunction" style="visibility:visible"><i class="bi bi-x-lg text-white" data-change></i>
        </button></td></tr>`;
      } else {
        let first = document.querySelector('tr');
        if (first.hasAttribute('data-file')) {
          first.insertAdjacentHTML('beforebegin', `<tr data-file='${completeFile}'><td class="p-3"><img src='./assets/dir.png' class='icon me-2' 
        alt='txt' data-change/><a class="link text-white" href="?p=${fileNameHref}" data-change>${completeFile}</a></td>
        <td class="p-3"><p data-change></p></td><td class="p-3"><p data-change></p></td><td class="p-3" data-file="${completeFile}" 
        data-type="file"><button type="button" class="border border-0 bg-transparent me-1" data-bs-toggle="modal" data-bs-target="#renameModal"
        onclick="renameFileModal(event);" id="renameFunction" style="visibility:visible"><i class="bi bi-pencil text-white" data-change></i>
        </button><form onsubmit="copyFile(event);" id="copyFunction" style="visibility:visible"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-clipboard text-white" id="copyIcon" data-change></i></button></form><form onsubmit="moveFile(event)" id="moveFunction" 
        style="visibility: visible"><button type="submit" class="border border-0 bg-transparent me-1"><i class="bi bi-scissors text-white" id="moveIcon" data-change></i>
        </button></form><form style="visibility: hidden" class="me-2"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-file-earmark-zip text-white me-2" data-change></i></button></form><button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal"
        onclick="deleteFileModal(event);" id="deleteFunction" style="visibility:visible"><i class="bi bi-x-lg text-white" data-change></i>
        </button></td></tr>`);
        } else {
          document.querySelector('#tbody').innerHTML = '';
          document.querySelector('#tbody').insertAdjacentHTML('beforeend', `<tr data-file='${completeFile}'><td class="p-3"><img src='./assets/dir.png' class='icon me-2' 
        alt='txt' data-change/><a class="link text-white" href="?p=${fileNameHref}" data-change>${completeFile}</a></td>
        <td class="p-3"><p data-change></p></td><td class="p-3"><p data-change></p></td><td class="p-3" data-file="${completeFile}" 
        data-type="file"><button type="button" class="border border-0 bg-transparent me-1" data-bs-toggle="modal" data-bs-target="#renameModal"
        onclick="renameFileModal(event);" id="renameFunction" style="visibility:visible"><i class="bi bi-pencil text-white" data-change></i>
        </button><form onsubmit="copyFile(event);" id="copyFunction" style="visibility:visible"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-clipboard text-white" id="copyIcon" data-change></i></button></form><form onsubmit="moveFile(event)" id="moveFunction" 
        style="visibility: visible"><button type="submit" class="border border-0 bg-transparent me-1"><i class="bi bi-scissors text-white" id="moveIcon" data-change></i>
        </button></form><form style="visibility: hidden" class="me-2"><button type="submit" class="border border-0 bg-transparent me-1">
        <i class="bi bi-file-earmark-zip text-white me-2" data-change></i></button></form><button type="button" class="border border-0 bg-transparent" data-bs-toggle="modal" data-bs-target="#deleteModal"
        onclick="deleteFileModal(event);" id="deleteFunction" style="visibility:visible"><i class="bi bi-x-lg text-white" data-change></i>
        </button></td></tr>`);
        }
      }
    });
}

// DELETE /////////////////////////////////////////////////////////////////////////////

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
        const dirTr = document.createElement('tr');
        let fullDirTd = document.createElement('td');
        fullDirTd.textContent = 'No files were found';
        fullDirTd.classList.add('fw-bold');
        fullDirTd.classList.add('p-3');
        dirTr.append(fullDirTd);
        dirTr.innerHTML += '<td></td><td></td><td></td>';
        const dirTbody = document.querySelector('#tbody');
        dirTbody.append(dirTr);
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
        const trashTr = document.createElement('tr');
        let fullTrashTd = document.createElement('td');
        fullTrashTd.textContent = 'No files were found';
        fullTrashTd.classList.add('fw-bold');
        fullTrashTd.classList.add('p-3');
        trashTr.append(fullTrashTd);
        trashTr.innerHTML += '<td></td><td></td><td></td>';
        const trashTbody = document.querySelector('#tbody');
        trashTbody.append(trashTr);
        custom_alert('Files deleted succesfully from trash!', 'success');
      } else if (res.trash == 'is-empty') {
        custom_alert('The trash is empty', 'warning');
      }
    })
    .catch(function (error) {
      custom_alert("Can't connect to backend, try latter", 'danger');
      console.log(error);
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
      if (document.querySelectorAll('tr[data-file]').length === 0) {
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
      custom_alert('File deleted succesfully!', 'success');
    })
    .catch(function (error) {
      console.log(error);
      custom_alert("Can't connect to backend, try latter", 'danger');
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
    .catch(function () {
      custom_alert("Can't connect to backend, try latter", 'danger');
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
    .catch(function (error) {
      console.log(error);
      custom_alert("Can't connect to backend, try latter", 'danger');
    });

}

// RENAME //////////////////////////////////////////////////////////////////////////////////////////////////

function renameFile(e) {
  e.preventDefault();
  const newName = rename.value;
  const oldName = document.querySelector("#renameTitle").getAttribute("data-file");
  const file = new FormData();
  console.log('Nuevo: ' + newName);
  console.log('Viejo: ' + oldName);
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
      if (res.type === 'dir') {
        const modify = document.querySelector(`tr[data-file='${oldName}']`);
        modify.removeAttribute("data-file");
        const link = modify.children[0].children[1];
        modify.setAttribute("data-file", res.name);
        link.textContent = res.name;
        let href = link.href.split("=")[0];
        href += `=${res.name}`;
        href = href.replace(' ', '%20');
        link.href = href;
      } else {
        let completeName = '';
        if (res.ext)
          completeName = res.name + "." + res.ext;
        else
          completeName = res.name;
        const modify = document.querySelector(`tr[data-file='${oldName}']`);
        modify.removeAttribute("data-file");
        const link = modify.children[0].children[1];
        modify.setAttribute("data-file", completeName);
        link.textContent = completeName;
        let href = link.href.split("=")[0];
        href += `=${completeName}`;
        href = href.replace(' ', '%20');
        link.href = href;
      }
      custom_alert("The name has been changed successfully", "success");
    }) /* else {
        custom_alert("Can´t rename the file", 'danger');
      } */
    .catch(function (error) {
      console.log(error);
      custom_alert("Can't connect to backend, try latter", 'danger');
    });
}

// MOVE ///////////////////////////////////////////////////////////////////////////////////////

function copyFile(e) {
  e.preventDefault();
  const fileName = e.target.parentNode.getAttribute("data-file");
  //const fileType = e.target.parentNode.getAttribute("data-type");

  const file = new FormData();
  file.append('name', fileName);
  file.append('action', 'copy');
  //file.append('type', fileType);

  const config = {
    'method': 'POST',
    'body': file,
  }

  fetch("./copy_path.php", config)
    .then(res => res.json())
    .then(res => {
      addCopyAction(e);
    })
    .catch(function (error) {
      console.log(error);
      custom_alert("Can't connect to backend, try latter", 'danger');
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
      addMoveAction(fileName, e);
    })
    .catch(function (error) {
      console.log(error);
      custom_alert("Can't connect to backend, try latter", 'danger');
    });
}




