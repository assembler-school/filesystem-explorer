const renameFunction = document.querySelectorAll('#renameFunction');
const copyFunction = document.querySelectorAll('#copyFunction');
const moveFunction = document.querySelectorAll('#moveFunction');
const deleteFunction = document.querySelectorAll('#deleteFunction');
const unzipFunction = document.querySelectorAll('#unzipFunction');
const pasteBtn = document.querySelector('#pasteFunction');
const emptyAll = document.querySelector('#emptyAll');
const openTrash = document.querySelector('#openTrash');
const searchBar = document.querySelector(`#searchBar`);
const createModalBtn = document.querySelector(`#openCreateModal`);
const uploadBtn = document.querySelector(`#uploadForm label`);

function addMoveAction(e) {
  const name = e.target.parentNode.getAttribute('data-file');
  const targets = document.querySelectorAll(`tr[data-file='${name}'] td [data-change]`);    // add opacity to row
  targets.forEach(node => {
    node.style.opacity = 0.2
  });
  e.target.children[0].setAttribute('disabled', '');      // disable cut button
  hideExtraOptions(name, 'copy');

  //document.querySelector(`td[data-file='${fileName}']`).setAttribute('data-no-paste', '');
}

function addCopyAction(e) {
  const name = e.target.parentNode.getAttribute('data-file');
  const copyIcon = e.target.children[0].children[0];        // change copy actoin color
  copyIcon.classList.remove('text-white');
  copyIcon.classList.add('text-primary');
  e.target.children[0].setAttribute('disabled', '');          // disable copy button
  hideExtraOptions(name, 'move');

  //e.target.parentNode.setAttribute('data-no-paste', '');
}

function hideExtraOptions(name, option) {

  const allFiles = document.querySelectorAll(`td[data-type='file']`);           // avoid click on files
  allFiles.forEach(file => {
    file.parentNode.children[0].children[1].style.pointerEvents = 'none';
  });
  document.querySelector(`tr[data-file='${name}'] td a`).style.pointerEvents = 'none';    // avoid click on folder if is selected
  searchBar.setAttribute('disabled', '');
  createModalBtn.setAttribute('disabled', '');    // disable general functions
  createModalBtn.style.cursor = 'default';
  createModalBtn.style.pointerEvents = 'none';
  uploadBtn.style.pointerEvents = 'none';
  uploadBtn.style.cursor = 'default';
  openTrash.style.visibility = 'hidden';
  emptyAll.style.visibility = 'hidden';

  renameFunction.forEach(node => {          // disable specific functions
    node.style.visibility = 'hidden';
  });
  deleteFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
  unzipFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });

  if (option === 'move')
    moveFunction.forEach(node => {
      node.style.visibility = 'hidden';
    });
  else
    copyFunction.forEach(node => {
      node.style.visibility = 'hidden';
    });
}

// CANCEL COPY OR MOVE

document.onkeydown = function (evt) {
  evt = evt || window.event;
  var isEscape = false;
  if ("key" in evt) {
    isEscape = (evt.key === "Escape" || evt.key === "Esc");
  } else {
    isEscape = (evt.keyCode === 27);
  }
  if (isEscape) {
    fetch('./removeCopyAndMoveSession.php')
      .then(res => res.json())
      .then(res => {
        restartPaste();
      })
  }
}

function restartPaste() {
  moveFunction.forEach(el => {
    el.style.visibility = 'visible';
    el.parentNode.style.opacity = '1';
    el.children[0].removeAttribute('disabled');
  });
  copyFunction.forEach(el => {
    el.style.visibility = 'visible';
    el.children[0].children[0].classList.remove('text-primary');
    el.children[0].children[0].classList.add('text-white');
    el.children[0].removeAttribute('disabled');
  });
  deleteFunction.forEach(el => {
    el.style.visibility = 'visible';
  });
  renameFunction.forEach(el => {
    el.style.visibility = 'visible';
  });
  unzipFunction.forEach(node => {
    node.style.visibility = 'visible';
  });
  document.querySelectorAll('tr[data-file] [data-change]').forEach(el => {
    el.style.opacity = 1;
  });
  /*   document.querySelectorAll('[data-no-paste]').forEach(el => {
      el.removeAttribute('data-no-paste');
    }); */
  openTrash.style.visibility = 'visible';
  emptyAll.style.visibility = 'visible';
  pasteBtn.style.display = 'none';

  const allFiles = document.querySelectorAll(`td[data-type]`);
  allFiles.forEach(file => {
    file.parentNode.children[0].children[1].style.pointerEvents = 'inherit';
  });

  document.querySelector(`#searchBar`).removeAttribute('disabled');
  document.querySelector(`#openCreateModal`).removeAttribute('disabled');
  document.querySelector(`#openCreateModal`).style.cursor = 'pointer';
  document.querySelector(`#openCreateModal`).style.pointerEvents = 'inherit';
  document.querySelector(`#uploadForm label`).style.pointerEvents = 'inherit';
  document.querySelector(`#uploadForm label`).style.cursor = 'pointer';
}
