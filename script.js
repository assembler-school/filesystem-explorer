$(".optionsMenu").hide();
$(".newFolderForm").hide();
$(".closeDiv").hide();
$(".folder").css("background-color","red");
let path="./directories";
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
function rightButton(){
    $(".folder").contextmenu((event)=>{
        console.log(event.target.id)
        $("#"+`${event.target.id}`+" "+".deleteEditOp").show();
        $(".sureToRemove a").attr("href",`./dirManege/delete.php?path=.${path}/${event.target.getAttribute("data")}`)
        $(".closeDiv").show();
        }
    )
}
rightButton();

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
         $(".sureToRemove").hide();
         $(".closeDiv").hide();
    }
)
function showSureToRemove(){
    $("#delete button").on("click", ()=>{
    $(".sureToRemove").show();
    $(".closeDiv").show();
    })
}
showSureToRemove();

function dubleClick(){
    $(".folder").on("dblclick",(e)=>{
        $(".folder").hide();
        path = path+"/"+e.target.getAttribute("data");

        $(".newFolderForm form").attr("action",`./dirManege/create.php?path=${path}`)
        //$(".sureToRemove a").attr("href",`./dirManege/delete.php?path=.${path}`)
        // $(".newFolderForm form").attr("action",`./dirManege/create.php?path=${path}`)


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
}

dubleClick();
