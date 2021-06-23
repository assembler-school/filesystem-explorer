// Adding listeners

$("#addNew").on("click", showNewOptions);
// $("body").on("click", hideNewOptions);

function showNewOptions() {
  if ($("#newOptionsPanel").css("display") === "none") {
    $("#newOptionsPanel").show();
  }
}

function hideNewOptions(event) {
  console.log($("#newOptionsPanel").css("display"));
  console.log(event.target);
  if (
    $("#newOptionsPanel").css("display") !== "none" &&
    event.target !== $("#newOptionsPanel")
  ) {
    $("#newOptionsPanel").hide();
  }
}
