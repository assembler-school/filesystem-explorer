
document.oncontextmenu = function () {
    return false; 
}

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
    $("#"+`${event.target.id}`+" "+".deleteEditOp").show();
    $(".closeDiv").show();
    }
)

$("#edit button").on("click",(event)=>{
    $("body").prepend("<div class=editFoldername>"+event.target.id+"</div>");
    $(".editFoldername").append("<form  action='./dirManege/edit.php?oldName="+`${event.target.id}'`+" "+"method='post'></form>");
    $(".editFoldername form").append("<div class='form-floating'></div>");
    $(".form-floating").append("<input id='floatingInput' class='form-control' type='text' name='editDirName' id='submitButon'>");
    $(".form-floating").append("<label for='floatingInput'>New folder name</label>");
    $(".editFoldername form").append(" <button type='submit' class='btn btn-outline-success'>submit</button>");
    }
)

$(".closeDiv").on("click",()=>{
        $(".editFoldername").remove();
         $(".optionsMenu").hide();
         $(".newFolderForm").hide();
         $(".deleteEditOp").hide();
         $(".closeDiv").hide();
    }
)

$(".folder").on("dblclick",(e)=>{
    $(".folder").hide();
    let element=e.target.id;
    
    $.ajax({
                url: "./dirManege/dirContent.php",
                type:"post",
                data:{
                    "dirToRender": `../directories/${element}`,
                    "inside":true
                    },
                success: function(response)
                {$(".folders").append(response);}
    })
})

// function showResult(str) {
//     if (str.length==0) {
//       document.getElementById("livesearch").innerHTML="";
//       document.getElementById("livesearch").style.border="0px";
//       return;
//     }
//     var xmlhttp=new XMLHttpRequest();
//     xmlhttp.onreadystatechange=function() {
//       if (this.readyState==4 && this.status==200) {
//         document.getElementById("livesearch").innerHTML=this.responseText;
//         document.getElementById("livesearch").style.border="1px solid #A5ACB2";
//       }
//     }
    
//     xmlhttp.send();
//   }
