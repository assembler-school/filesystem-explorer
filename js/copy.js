const renameFunction = document.querySelectorAll('#renameFunction');
const copyFunction = document.querySelectorAll('#copyFunction');
const moveFunction = document.querySelectorAll('#moveFunction');
const deleteFunction = document.querySelectorAll('#deleteFunction');
const unzipFunction = document.querySelectorAll('#unzipFunction');
const pasteBtn = document.querySelector('#pasteFunction');
const emptyAll = document.querySelector('#emptyAll');
const openTrash = document.querySelector('#openTrash');

function addMoveAction(fileName, e) {
  //VISUAL
  const targets = document.querySelectorAll(`tr[data-file='${fileName}'] td [data-change]`);
  targets.forEach(node => {
    node.style.opacity = 0.2
  });
  e.target.children[0].setAttribute('disabled', '');
  document.querySelector(`td[data-file='${fileName}']`).setAttribute('data-no-paste', '');
  const allFiles = document.querySelectorAll(`td[data-type='file']`);
  allFiles.forEach(file => {
    file.parentNode.children[0].children[1].style.pointerEvents = 'none';
  });
  document.querySelector(`tr[data-file='${fileName}'] td a`).style.pointerEvents = 'none';
  openTrash.style.visibility = 'hidden';
  emptyAll.style.visibility = 'hidden';
  changeStylesWhenCopyOrMove();
  copyFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
}

function addCopyAction(e) {
  //VISUAL
  const name = e.target.parentNode.getAttribute('data-file');
  e.target.children[0].children[0].classList.remove('text-white');
  e.target.children[0].children[0].classList.add('text-primary');
  e.target.parentNode.setAttribute('data-no-paste', '');
  const allFiles = document.querySelectorAll(`td[data-type='file']`);
  allFiles.forEach(file => {
    file.parentNode.children[0].children[1].style.pointerEvents = 'none';
  });
  e.target.children[0].setAttribute('disabled', '');
  document.querySelector(`tr[data-file='${name}'] td a`).style.pointerEvents = 'none';
  changeStylesWhenCopyOrMove();
  openTrash.style.visibility = 'hidden';
  emptyAll.style.visibility = 'hidden';
  moveFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
}

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
  document.querySelectorAll('[data-no-paste]').forEach(el => {
    el.removeAttribute('data-no-paste');
  });
  openTrash.style.visibility = 'visible';
  emptyAll.style.visibility = 'visible';
  pasteBtn.style.display = 'none';

  const allFiles = document.querySelectorAll(`td[data-type]`);
  allFiles.forEach(file => {
    file.parentNode.children[0].children[1].style.pointerEvents = 'inherit';
  });
}

function changeStylesWhenCopyOrMove() {
  renameFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
  deleteFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
  unzipFunction.forEach(node => {
    node.style.visibility = 'hidden';
  });
}
