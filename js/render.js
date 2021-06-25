// Adding listeners
$("#addNew").on("click", showNewOptions);
$("#newOptionsPanelBackground").on("click", hideNewOptions);
$("#createFolder").on("click", showCreateFolderForm);
$("#createFolderBackground").on("click", hideCreateFolderForm);
$("#cancelBtnForm").on("click", hideCreateFolderForm);
$("#closeCreateFolderBtn").on("click", hideCreateFolderForm);

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
