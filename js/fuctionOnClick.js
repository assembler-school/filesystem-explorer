/*$( "#target" ).dblclick(function() {
     alert( "Handler for .dblclick() called." );
});*/

function handleEvents() {
     /* Click event */
     
     document.addEventListener("click", (e) => {
          console.log("estoy dentro pero no hago el click");
       if (e.target.matches(".clickMe>*")) {
          var prueba = e.target.dataset.id;
          var formId = new FormData();
          formId.append("prueba", prueba);
          $.ajax({
               type: "POST",
               url: "includes/showData.php",
               data: formId,
               dataType:"json",
               //asycn:false,
               cache: false,
               contentType: false,
               processData: false,
               success: function(data){
                   console.log(data);
                   if(data === null){

                   }else{
                         //$("#name").remove();
                         if(data.size == "null" && data.extension == "null" ){
                              $("#labelSize").hide();
                              $("#labelExtension").hide();
                              $("#size").hide();
                              $("#extension").hide();
                              $("#titleName").text(data.name);
                              $("#name").text(data.name);
                              $("#dateCreation").text(data.dataCreation);
                              $("#modification").text(data.modification);
                         }
                         if(data.size !== "null" && data.extension !== "null" ){
                              $("#labelSize").show();
                              $("#labelExtension").show();
                              $("#size").show();
                              $("#extension").show();
                              $("#titleName").text(data.name);
                              $("#name").text(data.name);
                              $("#dateCreation").text(data.dataCreation);
                              $("#modification").text(data.modification);
                              $("#size").text(data.size);
                              $("#extension").text(data.extension);
                         }
                   }
               }
           });
       }
     });
}

handleEvents();     