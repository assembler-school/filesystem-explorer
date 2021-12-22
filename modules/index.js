/*toggle sub menus*/
$(document).ready(function () {
  $('.sub-btn').on("click", function () {
    $(this).next('.sub-menu').slideToggle();
    console.log('hola');
  });
});

$("#btnCreate").on("click", function () {
  console.log("funciona");
})


function pathToggleActive() {
  const breadcrumb = $(".breadcrumb");
  $(breadcrumb).children().last().addClass("active");
  console.log($(breadcrumb).children().last());

}
pathToggleActive();

function edit() {
  $(".renameBtn").on("click", function (e) {

    console.log(e.target)
  })
};
edit();

//show trash icon
var files = document.getElementsByClassName("sub-item")
var svgTrash = document.getElementsByClassName("trash-icon")
for (let i = 0; i < files.length; i++) {
  files[i].addEventListener("mouseover", showTrash)
  files[i].addEventListener("mouseout", notShowTrash)
  function showTrash() {
    svgTrash[i].style.display = 'block'
  }
  function notShowTrash() {
    svgTrash[i].style.display = 'none'
  }
}

$(".folder").on("click", oneclick)
$(".folder").on("dblclick", doubleclick)
$(".folder").focusin(function (e) {
  $(e.target).parent().css("background-color", "lightblue");
})
$(".folder").focusout(function (e) {
  $(e.target).parent().css("background-color", "inherit");
})



function oneclick(e) {
  e.preventDefault();

}
function doubleclick(e) {
  e.preventDefault();
  href = $(e.target).parent().attr("href")
  console.log($(e.target).parent().attr("href"));
  window.location.href = href;

}
