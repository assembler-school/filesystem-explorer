$(".optionsMenu").hide();
$(".newFolderForm").hide();
$(".closeDiv").hide();

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
function editModal(){
    
    $("#edit button").on("click",(event)=>{
        console.log(event.target.getAttribute("data"))
        $("body").prepend("<div class=editFoldername>"+event.target.getAttribute("data")+"</div>");
        $(".editFoldername").append("<form  action='./dirManege/edit.php?oldName="+path+"/"+`${event.target.getAttribute("data")}&pathNew=${path}'`+" "+"method='post'></form>");
        $(".editFoldername form").append("<div class='form-floating'></div>");
        $(".form-floating").append("<input id='floatingInput' class='form-control' type='text' name='editDirName' id='submitButon'>");
        $(".form-floating").append("<label for='floatingInput'>New folder name</label>");
        $(".editFoldername form").append(" <button type='submit' class='btn btn-outline-success'>submit</button>");
        
        }
    )
}
editModal();
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
       

        $.ajax({
            url: "./dirContent.php",
            type:"post",
            data:{"path":path},
            success: function(response)
            {$(".folders").append(response)}
        })
    })
}

dubleClick();
 
// function firstLevel(){
//     $.ajax({
//         url: "./dirContent.php",
//         type:"post",
//         data:{"path":path},
//         success: function(response)
//         {$(".folders").append(response)}
//     })
// }
// firstLevel();
