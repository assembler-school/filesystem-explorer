// CANCEL COPY OR MOVE

document.onkeydown = function (evt) {
  console.log(evt);
  evt = evt || window.event;
  var isSupr = false;
  if ("key" in evt) {
    isSupr = (evt.key === "Delete");
  } else {
    isSupr = (evt.keyCode === 46);
  }

  if (isSupr) {
    fetch('./destroySession.php')
  }
}
