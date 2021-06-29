targetClassName = "";
targetIdName = "";

$(document).on("click", (e) => {
  targetClassName = e.target.className;
  targetIdName = e.target.id;
  path = e.target.dataset.dir;
  if (targetClassName.indexOf("file-info") !== -1) {
    $(".file-info-container").removeClass("info-container-anim");
    if (path) {
      updatePath(path);
    }
    if (targetIdName === "delete-file") {
      deleteFile(path);
    }
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

$("#search-bar").on("input", (e) => {
  // $("#printer").html(e.target.value);
  let path = "/xampp/htdocs/filesystem-explorer/src/UNIT";
  let pattern = e.target.value;
  searchPatternInDir(path, pattern);
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
      $("#printer").html(response);
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

function deleteFile(path) {
  $.ajax({
    url: "fileControll/deleteFile.php",
    success: function (response) {
      $(".file-info-container").html(response);

      var split = path.split("/");
      path = split.slice(0, split.length - 1).join("/");
      selectFolder(path);
    },
  });
}

function searchPatternInDir(path, pattern) {
  console.log(path);
  $.ajax({
    type: "POST",
    url: "fileControll/searchPatternInDir.php",
    data: { path: path, valid: "yes", pattern: pattern },
    success: function (response) {
      $("#printer").html(response);
    },
  });
}
