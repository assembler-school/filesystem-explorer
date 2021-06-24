// Adding listeners
$("#addNew").on("click", showNewOptions);
$("#newOptionsPanelBackground").on("click", hideNewOptions);

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
