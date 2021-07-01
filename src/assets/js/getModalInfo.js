const deleteModal = document.getElementById('deleteFileModal');
const renameModal = document.getElementById('renameFolderModal');
const videoModal = document.getElementById('videoModal');
const imgModal = document.getElementById('imgModal');
const audioModal = document.getElementById('audioModal');

deleteModal.addEventListener("show.bs.modal", function (e) {
  // Getting dinamically the path of the file to remove it
  modalFilePath = e.relatedTarget.getAttribute("data-delete");
  const deleteLink = document.getElementById("deleteLink");
  // Setting by GET method the deleting function
  deleteLink.href = "./src/modules/deleting_file.php?filePath=" + modalFilePath;
});

renameModal.addEventListener("show.bs.modal", function (e) {
  // Getting dinamically the path of the folder to rename
  modalFolderPath = e.relatedTarget.getAttribute("data-edit");
  const renameButton = document.getElementById("btnRenameFolder");
  // Setting to the button the path value for POST method to rename the folder
  renameButton.value = modalFolderPath;
});

videoModal.addEventListener('show.bs.modal', function (e) {
  videoPath = e.relatedTarget.getAttribute('data-video');
  videoParent = document.getElementById('colVideo');

  // If we have the modal empty, we fill with the video or we replace with the new one
  if (videoParent.childElementCount > 0) {
    videoParent.innerHTML = "";
  }
  var video = document.createElement("video");
  video.id = "videoPlayer";
  video.src = videoPath;
  video.setAttribute('controls', 'controls');
  video.classList.add("width-media");
  document.getElementById('colVideo').appendChild(video);
})

// Stopping video when the modal closes
videoModal.addEventListener('hide.bs.modal', function (e) {
  videoStop = document.getElementById('videoPlayer');
  videoStop.pause();
})

audioModal.addEventListener("show.bs.modal", function (e) {
  audioPath = e.relatedTarget.getAttribute("data-audio");
  audioParent = document.getElementById("colAudio");

  if (audioParent.childElementCount > 0) {
    audioParent.innerHTML = "";
  }
  var audio = document.createElement("audio");
  audio.id = "audioPlayer";
  audio.src = audioPath;
  audio.setAttribute("controls", "type='audio/mp3'");
  audio.classList.add("width-media");
  document.getElementById("colAudio").appendChild(audio);
});

// Stopping audio when the modal closes
audioModal.addEventListener('hide.bs.modal', function (e) {
  audioStop = document.getElementById('audioPlayer');
  audioStop.pause();
})


imgModal.addEventListener('show.bs.modal', function (e) {
  imgPath = e.relatedTarget.getAttribute('data-img');
  imgParent = document.getElementById('colImg');

  // If we have the modal empty, we fill with the picture or we replace with the new one
  if (imgParent.childElementCount > 0) {
    imgParent.innerHTML = '';
  }
  var img = document.createElement('img');
  img.src = imgPath;
  img.classList.add("width-media");
  document.getElementById('colImg').appendChild(img);
})
