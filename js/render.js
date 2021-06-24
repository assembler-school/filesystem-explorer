// Adding listeners
$("body").on("click", showHideNewOptions);

// Render Functions
function showHideNewOptions(event) {
  if (
    $("#newOptionsPanel").css("display") === "none" &&
    event.target.id === "addNew"
  ) {
    $("#newOptionsPanel").show();
  } else {
    $("#newOptionsPanel").hide();
  }
}
