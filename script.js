
let deleteButtons = document.querySelectorAll(".folder")
console.log(deleteButtons)

 
deleteButtons.forEach((each)=>{
   each.addEventListener("submit",(e)=>{
       e.preventDefault();
       console.log(e.target)
    
    $.ajax({
        url: "root.php?action=funciona",
        type:"POST",
        //data:new FormData(this),
        contentType: false,
    	cache: false,
        processData:false,
        success: function(response)
      {console.log(response);}
      
   });
})
})
