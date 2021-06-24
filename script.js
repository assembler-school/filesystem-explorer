$(".newFolderForm").hide();
$(".newFolderButon").on("click",()=>{
    if($(".newFolderForm").hide()){
        $(".newFolderForm").show();
    }else{
        $(".newFolderForm").hide();
    }
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
