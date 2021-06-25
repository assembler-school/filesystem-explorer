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
    $.ajax({
                url: "./dirManege/dirContent.php?dirToRender="+`${e.target.id}`,
                type:"POST",
                //data:new FormData(this),
                contentType: false,
            	cache: false,
                processData:false,
                success: function(response)
                {$(".folders").append(response);}
    })
})

