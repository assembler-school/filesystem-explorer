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

$("#deleteModal").on("show.bs.modal", showDeleteModal)

function showDeleteModal(e) {
  const url = $(e.relatedTarget).data("url");
  console.log(url);
  $("#deleteForm").append(`
      <input type="hidden" name="url" value="${url}">
  `)
}

function edit() {
  $("#modalEdit").on("show.bs.modal", showEditModal)

  function showEditModal(e) {
  const url = $(e.relatedTarget).data("url");
    console.log(url);
    $("#edit_form").append(`
      <input type="hidden" name="oldName" value="${url}">
  `)
  }
};
edit();

var closing = document.getElementsByClassName("closing")
var modalFiles1 = document.getElementById("modalFiles")
var btnClose = document.getElementsByClassName("btn-close")
console.log(btnClose)
closing[0].addEventListener("click", closeclose)
for (let i = 0; i < btnClose.length; i++) {
  btnClose[i].addEventListener("click", closeclose)
}

function closeclose() {
  modalFiles1.style.display= "none"
}