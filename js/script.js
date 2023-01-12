
function submit() {
  document.getElementById('uploadForm').submit();
}

function deleteAll(e) {
  e.preventDefault();

  fetch('./deleteAll.php')
    .then(res => res.json())
    .then(res => {
       if (res === 'ok') {
        alert("Deleting files");
        document.querySelectorAll('[data-file]').forEach(node => {
          node.remove();
        });
      } else {
        alert("No files");
      } 
    })
    .catch(function () {
      alert("Can't connect to backend try latter");
    });
}