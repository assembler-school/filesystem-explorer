const deleteForm = document.querySelector('#deleteForm');
const renameForm = document.querySelector('#renameForm');
const deleteTitle = document.querySelector('#deleteTitle');
const renameTitle = document.querySelector('#renameTitle');
const renameInput = document.querySelector('#rename');

function deleteAllModal() {
  deleteForm.onsubmit = function (event) {
    return deleteAll(event, 'folder');
  }
  deleteTitle.textContent = 'Delete all directories and files';
}

function deleteTrashModal() {
  deleteForm.onsubmit = function (event) {
    return deleteAll(event, 'trash');
  }
  deleteTitle.textContent = 'Delete Trash';
}

function deleteFileModal(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.parentNode.getAttribute('data-file');
  } else {
    name = e.target.parentNode.getAttribute('data-file');
  }
  deleteForm.onsubmit = function (event) {
    return deleteFile(event, name);
  }
  deleteTitle.textContent = `Delete ${name}`;
}

function renameFileModal(e) {
  let name = '';
  let type = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.parentNode.parentNode.getAttribute('data-file');
    type = e.target.parentNode.parentNode.parentNode.getAttribute('data-type');
  } else {
    name = e.target.parentNode.parentNode.getAttribute('data-file');
    type = e.target.parentNode.parentNode.getAttribute('data-type');
  }
  let finalName = '';
  if (type === 'file') {
    let array = name.split(".");
    if (array.length == 1) {
      finalName = name;
    }
    let ext = array.pop();
    if (isNaN(ext)) {
      array.forEach((pos, index) => {
        if (index > 0) finalName += '.' + pos;
        else finalName += pos;
      });
    } else {
      finalName = name;
    }
  } else {
    finalName = name;
  }
  renameInput.value = finalName;
  renameTitle.textContent = `Rename ${finalName}`;
  renameTitle.setAttribute("data-file", name);
}