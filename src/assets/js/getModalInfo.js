const deleteModal = document.getElementById('deleteFileModal');
const renameModal = document.getElementById('renameFolderModal');
const videoModal = document.getElementById('videoModal');

deleteModal.addEventListener('show.bs.modal', function (e) {
  modalFilePath = e.relatedTarget.getAttribute('data-delete');
  const deleteLink = document.getElementById('deleteLink');
  deleteLink.href = "./src/modules/deleting_file.php?filePath=" + modalFilePath;
})

renameModal.addEventListener('show.bs.modal', function (e) {
  modalFolderPath = e.relatedTarget.getAttribute('data-edit');
  const renameButton = document.getElementById('btnRenameFolder');
  renameButton.value = modalFolderPath;
})

videoModal.addEventListener('show.bs.modal', function (e) {
  videoPath = e.relatedTarget.getAttribute('data-video');
  videoParent = document.getElementById('colVideo');
  console.log(videoPath);

  if (videoParent.childElementCount === 0) {
    var video = document.createElement('video');
    video.src = videoPath;
    video.setAttribute('controls', 'width=300');
    document.getElementById('colVideo').appendChild(video);
  } else {
    videoParent.innerHTML = '';
    var video = document.createElement('video');
    video.src = videoPath;
    video.setAttribute('controls', 'width=300', 'height=300');
    document.getElementById('colVideo').appendChild(video);
  }
})
