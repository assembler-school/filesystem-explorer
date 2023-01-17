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
    name = e.target.parentNode.parentNode.getAttribute('data-file');
    type = e.target.parentNode.parentNode.getAttribute('data-type');
  } else {
    name = e.target.parentNode.getAttribute('data-file');
    type = e.target.parentNode.getAttribute('data-type');
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



document.addEventListener('DOMContentLoaded', (event) => {

  function handleDragStart(e) {
    this.style.opacity = '0.3';
    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDragEnd(e) {
    this.style.opacity = '1';

    items.forEach(function (item) {
      item.classList.remove('over');
    });
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }

    return false;
  }

  function handleDragEnter(e) {
    this.classList.add('over');
  }

  function handleDragLeave(e) {
    this.classList.remove('over');
  }

  function handleDrop(e) {
    e.stopPropagation();
    const to = document.querySelector(`tr[data-file='${e.target.getAttribute('data-tr')}']`);
    console.log(to);
    console.log(dragSrcEl);
    if (to.getAttribute('data-type') === 'dir') {
      const fileFrom = dragSrcEl.getAttribute('data-file');
      const folderTo = to.getAttribute('data-file');

      fetch(`./drop.php?old=${fileFrom}&new=${folderTo}`)
        .then(res => res.json())
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.error(err);
        });

      dragSrcEl.remove();
    }
    return false;
  }

  let items = document.querySelectorAll('tr[data-file]');
  items.forEach(function (item) {
    item.addEventListener('dragstart', handleDragStart);
    item.addEventListener('dragover', handleDragOver);
    item.addEventListener('dragenter', handleDragEnter);
    item.addEventListener('dragleave', handleDragLeave);
    item.addEventListener('dragend', handleDragEnd);
    item.addEventListener('drop', handleDrop);
  });
});;