document.addEventListener('DOMContentLoaded', (event) => {

  function handleDragStart(e) {
    this.style.opacity = '0.8';
    dragSrcEl = this;

    e.dataTransfer.effectAllowed = 'move';
    e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDragEnd(e) {
    this.style.opacity = '1';
  }

  function handleDragOver(e) {
    if (e.preventDefault) {
      e.preventDefault();
    }
    return false;
  }

  function handleDragEnter(e) {

  }

  function handleDragLeave(e) {

  }

  function handleDrop(e) {
    e.stopPropagation();

    const to = document.querySelector(`tr[data-file='${e.target.getAttribute('data-tr')}']`);
    const fileFrom = dragSrcEl.getAttribute('data-file');
    const folderTo = to.getAttribute('data-file');
    if ((to.getAttribute('data-type') === 'dir') && fileFrom !== folderTo) {
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
});