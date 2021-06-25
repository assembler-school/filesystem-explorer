targetClassName = "";

$(document).on("click", (e) => {
  targetClassName = e.target.className;
  path = e.target.dataset.dir;
  if (targetClassName.indexOf("file-info") !== -1) {
    $(".file-info-container").removeClass("info-container-anim");
    updatePath(path);
  } else {
    $(".file-info-container").addClass("info-container-anim");
  }
  if (targetClassName.indexOf("folder-tree-folder") !== -1) {
    selectFolder(path);
  }
  if (targetClassName.indexOf("folder-tree-file") !== -1) {
    searchFileInfo(path);
  }
});

function selectFolder(path) {
  updatePath(path);
  $.ajax({
    type: "POST",
    url: "fileControll/selectDir.php",
    data: { folder: path, valid: "yes" },
    beforeSend: function () {
      $(".main-content-ul").html("Procesando, espere por favor...");
    },
    success: function (response) {
      $(".main-content-ul").html(response);
    },
  });
}

function updatePath(path) {
  $.ajax({
    type: "POST",
    url: "fileControll/session.php",
    data: { path: path, valid: "yes" },
    success: function (response) {
      $("header").html(response);
    },
  });
}

function searchFileInfo(path) {
  console.log(path);
  $.ajax({
    type: "POST",
    url: "fileControll/searchFileInfo.php",
    data: { path: path, valid: "yes" },
    success: function (response) {
      $(".file-info-container").html(response);
    },
  });
}
