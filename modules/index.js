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

function edit(){
  $(".renameBtn").on("click", function(e) {

    console.log(e.target)
  })};
edit();



$(".folder").on("click", oneclick)
$(".folder").on("dblclick", doubleclick)
$(".folder").focusin(function (e) {
  console.log("hi");
  $(e.target).css("background-color", "blue");
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
