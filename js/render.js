// ------------ Global vars ---------------
var relativeX;
var relativeY;

// ----------- Adding listeners -----------

// New options panel
$("#addNew").on("click", showNewOptions);
$("#newOptionsPanelBackground").on("click", hideNewOptions);

// Folder form panel
$("#createFolder").on("click", showCreateFolderForm);
$("#createFolderBackground").on("click", hideCreateFolderForm);
$("#cancelBtnForm").on("click", hideCreateFolderForm);
$("#closeCreateFolderBtn").on("click", hideCreateFolderForm);

// Render fileDir options panel
$(".renderOptions").on("click", showFileDirOptions);
$("#newOptionsPanelBackground").on("click", hideFileDirOptions);

// Render Functions
function showNewOptions(event) {
  if (
    $("#newOptionsPanel").css("display") === "none" &&
    event.target.id === "addNew"
  ) {
    $("#newOptionsPanelBackground").show();
    $("#newOptionsPanel").show();
  }
}

function hideNewOptions() {
  $("#newOptionsPanel").hide();
  $("#newOptionsPanelBackground").hide();
}

function showCreateFolderForm() {
  $("#newOptionsPanel").hide();
  $("#newOptionsPanelBackground").hide();
  $("#createFolderForm").show();
  $("#createFolderBackground").show();
}

function hideCreateFolderForm() {
  $("#createFolderForm").hide();
  $("#createFolderBackground").hide();
}

function showFileDirOptions(event) {
  getWindowXY(event);
  $("#fileDirOptionsPanel").css("top", relativeY);
  $("#fileDirOptionsPanel").css("left", relativeX);
  $("#fileDirOptionsPanel").show();
  $("#newOptionsPanelBackground").show();
}

function hideFileDirOptions() {
  $("#fileDirOptionsPanel").hide();
  $("#newOptionsPanelBackground").hide();
}

// Other functions
function getWindowXY(event) {
  relativeX = event.pageX;
  relativeY = event.pageY;
}
