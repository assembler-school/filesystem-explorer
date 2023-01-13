const form = document.querySelector('#deleteForm');
const title = document.querySelector('#modalTitle');

function type_all() {
  form.onsubmit = function (event) {
    return deleteAll(event, 'folder');
  }
  title.textContent = 'Delete all directories and files';
}

function type_trash() {
  form.onsubmit = function (event) {
    return deleteAll(event, 'trash');
  }
  title.textContent = 'Delete Trash';
}

function type_file(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.getAttribute('data-file');
  } else {
    name = e.target.getAttribute('data-file');
  }
  form.onsubmit = function (event) {
    return deleteFile(event, name);
  }
  title.textContent = `Delete ${name}`;
}