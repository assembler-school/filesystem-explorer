const deleteModal = document.getElementById('deleteFileModal');
const renameModal = document.getElementById('renameFolderModal');
const videoModal = document.getElementById('videoModal');
const imgModal = document.getElementById('imgModal');

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

  // If we have the modal empty, we fill with the video or we replace with the new one
  if (videoParent.childElementCount === 0) {
    var video = document.createElement('video');
    video.src = videoPath;
    video.setAttribute('controls', 'controls');
    video.setAttribute('style', 'max-width=300px');
    document.getElementById('colVideo').appendChild(video);
  } else {
    videoParent.innerHTML = '';
    var video = document.createElement('video');
    video.src = videoPath;
    video.setAttribute('controls', 'controls');
    video.setAttribute('style', 'max-width=300px');
    document.getElementById('colVideo').appendChild(video);
  }
})

imgModal.addEventListener('show.bs.modal', function (e) {
  imgPath = e.relatedTarget.getAttribute('data-img');
  imgParent = document.getElementById('colImg');
  console.log(imgPath);

  // If we have the modal empty, we fill with the picture or we replace with the new one
  if (imgParent.childElementCount === 0) {
    var img = document.createElement('img');
    img.src = imgPath;
    document.getElementById('colImg').appendChild(img);
  } else {
    imgParent.innerHTML = '';
    var img = document.createElement('img');
    img.src = imgPath;
    document.getElementById('colImg').appendChild(img);
  }
})

