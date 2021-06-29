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
  if (targetIdName === "create-folder") {
    openCreateFolderModal();
  }
  if (targetClassName.indexOf("modal-background") !== -1) {
    closeCreateFolderModal();
  }
  if (targetIdName === "create-folder-btn") {
    createFolder(e);
  }
});

$("#search-bar").on("input", (e) => {
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
      $(".header-test").html(response);
    },
  });
}

function searchFileInfo(path) {
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
      $(".main-content-ul").html(response);
    },
  });
}

function openCreateFolderModal() {
  $.ajax({
    url: "fileControll/session.php",
    success: function (response) {
      $(".file-info-container").html(response);

      const templateContent = document.querySelector(
        "#create-folder-modal"
      ).content;
      document
        .querySelector("main")
        .appendChild(document.importNode(templateContent, true));
      $("#session-path").html(response);
    },
  });
}

function closeCreateFolderModal() {
  document.querySelector(".create-folder-modal")?.remove();
  document.querySelector(".modal-background")?.remove();
}

function createFolder(e) {
  e.preventDefault();
  let newFolderName = $("#create-folder-name").val();
  $.ajax({
    type: "POST",
    url: "fileControll/createFolder.php",
    data: { newFolderName: newFolderName, valid: "yes" },
    success: function (response) {
      selectFolder(response);
      closeCreateFolderModal();
    },
  });
}
