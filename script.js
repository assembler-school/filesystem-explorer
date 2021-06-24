$(".optionsMenu").hide();
$(".newFolderForm").hide();
$(".deleteEditOp").hide();
$(".closeDiv").hide();

$(".newFolderButon").on("click",()=>{
    $(".optionsMenu").show();
    $(".closeDiv").show();  
    } 
)

$("#showNewFolderForm").on("click",()=>{
    $(".newFolderForm").show();
    $(".closeDiv").show();  
    }
)

$(".folder").contextmenu((event)=>{
    $(".deleteEditOp").hide();
    console.log(event.target.id)
    $("#"+`${event.target.id}`+" "+".deleteEditOp").show();
    $(".closeDiv").show();
    }
)

$(".editBox").on("click",(event)=>{
    $("body").append("<div class=editFoldername>"+event.target.id+"</div>")
    }
)

$(".closeDiv").on("click",()=>{
    
         $(".optionsMenu").hide();
         $(".newFolderForm").hide();
         $(".deleteEditOp").hide();
         $(".closeDiv").hide();
    }
)



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
