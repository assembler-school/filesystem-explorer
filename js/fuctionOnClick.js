/*$( "#target" ).dblclick(function() {
     alert( "Handler for .dblclick() called." );
});*/

function handleEvents() {
     /* Click event */
     
     document.addEventListener("click", (e) => {
          console.log("estoy dentro pero no hago el click");
       if (e.target.matches(".clickMe>*")) {
          var prueba = e.target.dataset.id;
          console.log( e.target.dataset.id );
          console.log( prueba );
          var formId = new FormData();
          formId.append("prueba", prueba);
          console.log( formId );
          $.ajax({
               type: "POST",
               url: "includes/showData.php",
               data: formId,
               dataType:"html",
               //asycn:false,
               cache: false,
               contentType: false,
               processData: false,
               success: function(data){
                   console.log(data);
                   if(data === null){

                   }else{
                         //$("#name").remove();
                         $("#name").text(data);
                   }
               }
           });

       //console.log(saveme);
       }
     });
}

handleEvents();     