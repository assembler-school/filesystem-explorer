const directoriesTitle = document.getElementById("directories");
const directoriesContent = document.getElementById("directories-collapse");
const filesTitle = document.getElementById("files");
const filesContent = document.getElementById("files-collapse");

directoriesTitle.addEventListener("click", function () {
  if (directoriesContent.classList.contains("hidden")) {
    directoriesContent.classList.toggle("hidden");
    let opacityTime = setTimeout(function () {
      directoriesContent.style.opacity = "1";
      clearTimeout(opacityTime);
    }, 200);
  } else {
    directoriesContent.style.opacity = "0";
    let opacityTime = setTimeout(function () {
      directoriesContent.classList.toggle("hidden");
      clearTimeout(opacityTime);
    }, 200);
  }
});

filesTitle.addEventListener("click", function () {
  if (filesContent.classList.contains("hidden")) {
    filesContent.classList.toggle("hidden");
    let opacityTime = setTimeout(function () {
      filesContent.style.opacity = "1";
      clearTimeout(opacityTime);
    }, 200);
  } else {
    filesContent.style.opacity = "0";
    let opacityTime = setTimeout(function () {
      filesContent.classList.toggle("hidden");
      clearTimeout(opacityTime);
    }, 200);
  }
});
