/*toggle sub menus*/
$(document).ready(function(){
  $('.sub-btn').on("click", function(){
    $(this).next('.sub-menu').slideToggle();
    console.log('hola');
});
});

$("#btnCreate").on("click", function(){
console.log("funciona");
})

//show trash icon
var files = document.getElementsByClassName("sub-item")
var svgTrash = document.getElementsByClassName("trash-icon")
for (let i = 0; i < files.length; i++) {
  files[i].addEventListener("mouseover", showTrash)
  files[i].addEventListener("mouseout", notShowTrash)
  function showTrash() {
    svgTrash[i].style.display = 'block'
}
function notShowTrash(){
  svgTrash[i].style.display = 'none'
}
}
