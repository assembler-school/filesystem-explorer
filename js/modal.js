const form = document.querySelector('#deleteForm');
const title = document.querySelector('#modalTitle');

function type_all() {
  form.onsubmit = function (event) {
    return deleteAll(event);
  }
  title.textContent = 'Delete all directories and files';
}

function type_file(e) {
  let name = '';
  if (e.target.tagName == 'I') {
    name = e.target.parentNode.getAttribute('data-file');
  } else {
    name = e.target.getAttribute('data-file');
  }
  console.log(name);
  form.onsubmit = function (event) {
    return deleteFile(event);
  }
  title.textContent = `Delete ${name}`;
}