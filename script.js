$(".optionsMenu").hide();
$(".newFolderForm").hide();
$(".closeDiv").hide();
$(".folder").css("background-color","red");

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
    console.log(event.target.id)
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
    let path="./directories/"+ e.target.getAttribute("data");
    $(".newFolderForm form").attr("action",`./dirManege/create.php?path=${path}`)
    $.ajax({
                url: "./dirManege/dirContent.php",
                type:"post",
                data:{
                    
                    "path":path
            },
             
                success: function(response)
                {$(".folders").append(response)}
    })
})

