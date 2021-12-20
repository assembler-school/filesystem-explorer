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