document.oncontextmenu = function () {
  return false;
};

$(document).mousedown(function (e) {
  if (e.button === 2) {
    console.log(e.target);
    $(".rightClick").removeClass("showing");
    var n = $(".rightClick").clone(true);
    $(".rightClick").fadeOut(100);
    setTimeout(function () {
      $(".rightClick")
        .css({
          top: e.pageY - 100,
          left: e.pageX - 100,
        })
        .fadeIn(100)
        .addClass("showing");
    }, 200);
  } else if (e.button === 0) {
    setTimeout(function () {
      $(".rightClick").removeClass("showing").fadeOut(100);
    }, 150);
  }
});
$(".rightClick .overlap").click(function () {
  history.back(1); // To go back
  $(".showVal1").text("Back Button Pressed");
});
$(".rightClick .new").click(function () {
  console.log("test new button");
  $(".showVal1").text("New Button Pressed");
});
$(".rightClick .edit").click(function () {
  $(".showVal1").text("Edit Button Pressed");
});
$(".rightClick .help").click(function () {
  $(".showVal1").text("Help Button Pressed");
});
