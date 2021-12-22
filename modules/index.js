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
  const url = $(e.target).data("url");
});
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

$("#modalEdit").on("show.bs.modal", showEditModal)

function showEditModal(e) {
  const url = $(e.relatedTarget).data("url");
  console.log(url);
  $("#edit_form").append(`
      <input type="hidden" name="oldName" value="${url}">
  `)
}



if ($(".closing").length) {
  $(".closing").each(function (idx, element) {
    $(element).on("click", closeclose)
  })


}

function closeclose() {
  window.location.replace("./index.php");
}
