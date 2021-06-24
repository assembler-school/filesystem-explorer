// Adding listeners
$("#addNew").on("click", showNewOptions);
$("#newOptionsPanelBackground").on("click", hideNewOptions);

// Render Functions
function showNewOptions(event) {
  console.log("event.target ->", event.target);
  // console.log(event.target.css("pointer-events"));
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


