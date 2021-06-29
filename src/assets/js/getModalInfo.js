const deleteModal = document.getElementById('deleteFileModal');
const renameModal = document.getElementById('renameFolderModal');
const videoModal = document.getElementById('videoModal');
const imgModal = document.getElementById('imgModal');
const audioModal = document.getElementById('audioModal');

deleteModal.addEventListener("show.bs.modal", function (e) {
  modalFilePath = e.relatedTarget.getAttribute("data-delete");
  const deleteLink = document.getElementById("deleteLink");
  deleteLink.href = "./src/modules/deleting_file.php?filePath=" + modalFilePath;
});

renameModal.addEventListener("show.bs.modal", function (e) {
  modalFolderPath = e.relatedTarget.getAttribute("data-edit");
  const renameButton = document.getElementById("btnRenameFolder");
  renameButton.value = modalFolderPath;
});

videoModal.addEventListener('show.bs.modal', function (e) {
  videoPath = e.relatedTarget.getAttribute('data-video');
  videoParent = document.getElementById('colVideo');

  // If we have the modal empty, we fill with the video or we replace with the new one
  if (videoParent.childElementCount === 0) {
    var video = document.createElement("video");
    video.src = videoPath;
    video.setAttribute('controls', 'controls');
    video.setAttribute('style', 'max-width=300px');
    document.getElementById('colVideo').appendChild(video);
  } else {
    videoParent.innerHTML = "";
    var video = document.createElement("video");
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

audioModal.addEventListener("show.bs.modal", function (e) {
  audioPath = e.relatedTarget.getAttribute("data-audio");
  audioParent = document.getElementById("colAudio");
  console.log(audioPath);

  if (audioParent.childElementCount === 0) {
    var audio = document.createElement("audio");
    audio.src = audioPath;
    audio.setAttribute("controls", "type='audio/mpeg'");
    document.getElementById("colAudio").appendChild(audio);
  } else {
    audioParent.innerHTML = "";
    var audio = document.createElement("audio");
    audio.src = audioPath;
    audio.setAttribute("controls", "type='audio/mp3'");
    document.getElementById("colAudio").appendChild(audio);
  }
});
