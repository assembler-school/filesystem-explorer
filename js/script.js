
function submit() {
  document.getElementById('uploadForm').submit();
}

function deleteAll(e) {
  e.preventDefault();
  fetch('deleteAll.php')
    .then(res => res.json())
    .then(res => {
      console.log(res);
    });
  
  document.querySelectorAll('[data-file]').forEach(node => {
    node.remove();
  })
}