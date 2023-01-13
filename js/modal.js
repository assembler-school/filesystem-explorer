const deleteForm = document.querySelector('#deleteForm');
const renameForm =document.querySelector('#renameForm');
const deleteTitle = document.querySelector('#deleteTitle');
const renameTitle = document.querySelector('#renameTitle');
const renameInput = document.querySelector('#rename');

function type_all() {
  deleteForm.onsubmit = function (event) {
    return deleteAll(event, 'folder');
  }
  deleteTitle.textContent = 'Delete all directories and files';
}

function type_trash() {
  deleteForm.onsubmit = function (event) {
    return deleteAll(event, 'trash');
  }
  deleteTitle.textContent = 'Delete Trash';
}

function type_file(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.getAttribute('data-file');
  } else {
    name = e.target.getAttribute('data-file');
  }
  deleteForm.onsubmit = function (event) {
    return deleteFile(event, name);
  }
  deleteTitle.textContent = `Delete ${name}`;
}

function rename_file(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.getAttribute('data-file');
  } else {
    name = e.target.getAttribute('data-file');
  }
  renameInput.value = name.split(".")[0];
  renameTitle.textContent = `Rename ${name}`;
  renameTitle.setAttribute("data-file", name);
}
