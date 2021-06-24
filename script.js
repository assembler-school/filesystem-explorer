$(".optionsMenu").hide();
$(".newFolderForm").hide();
$(".deleteEditOp").hide();

$(".newFolderButon").on("click",()=>{
        $(".optionsMenu").show();  
    } 
)

$("#showNewFolderForm").on("click",()=>{
    $(".newFolderForm").show();  
    }
)

$(".folder").contextmenu((event)=>{
    $(".deleteEditOp").hide();
    console.log(event.target.id)
    $("#"+`${event.target.id}`+" "+".deleteEditOp").show();
})
$(".editBox").on("click",(event)=>{
    $("body").append("<div class=editFoldername>"+event.target.id+"</div>")
})




// let deleteButtons = document.querySelectorAll(".buton")
// console.log(deleteButtons)

 
// deleteButtons.forEach((each)=>{
//    each.addEventListener("submit",(e)=>{
//        e.preventDefault();
//        console.log(e.target)
    
//     $.ajax({
//         url: "./root.php",
//         type:"POST",
//         //data:new FormData(this),
//         contentType: false,
//     	cache: false,
//         processData:false,
//         success: function(response)
//       {console.log(response);}
      
//    });
// })
// })
