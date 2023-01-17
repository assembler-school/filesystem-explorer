// const uploadFile = document.querySelector('.upload-file');
// const fileToUpload = document.querySelector('.file-to-upload');

const createFolder = document.querySelector('.create-btn');
const folderNameToCreate = document.querySelector('.folder-name');


createFolder.addEventListener("click", createNewFolder);



function createNewFolder() {

    console.log("hola")

    let folderName = folderNameToCreate.value;
    
    console.log(folderName);

    fetch ("../filesystem-explorer/create-folder.php?nameFolder="+folderName)
    .then(response => response.json())
    .then(data => console.log(data))

    location.reload();
}



const deleteFiles = document.querySelectorAll(".delete-btn");


deleteFiles.forEach(element => {
    element.addEventListener("click", deleteFolder)
});

function deleteFolder(event){
    const popUpDeleteConfirm = confirm("Do you want to delete this folder?");
    console.log(popUpDeleteConfirm);
    if (popUpDeleteConfirm){
        let actualFolderName = event.srcElement.getAttribute("actual-folder");
        console.log(actualFolderName);
        if (!actualFolderName.includes(".")){
            
            fetch("delete-folder.php?actualFolderName=./"+actualFolderName)
            .then(response=>response.json())
            .then(data =>console.log(data));
        }else{
            fetch("delete-file.php?actualFolderName=./"+actualFolderName)
            .then(response=>response.json())
            .then(data =>console.log(data));
        }
    }
    location.reload();
}

// modify folder

const edit = document.querySelectorAll(".edit-btn");



// for (let i of edit){
//     i.addEventListener("click", editName);
//     oldname = i.getAttribute("actualFolder");
// }

for (let i of edit){
    i.addEventListener("click", editName);
    var oldname = i.getAttribute("actualFolder");
    // console.log(oldname);
}

console.log(oldname)

function editName(event){
    
    newname = prompt("Write the new name of the folder or file:");
    // let data = {oldName: oldname , newName : newname};
    var dataform = new FormData();
    dataform.append("oldName", oldname);
    dataform.append("newname", newname);
    fetch ("./edit-folder.php",{
        method : "POST",
        body : dataform
    })
    .then(response=>response.json())
    .then(data =>console.log(data));

}


const buscador = document.querySelector(".buscador");
const buscadorValue = document.querySelector(".buscadorValue");
const listSearch = document.querySelector("#searchResults");

buscador.addEventListener("click", search);

function search(e){
    e.preventDefault();
    var searchValue = buscadorValue.value;
    fetch("search.php?searchParam="+searchValue)
    .then(response=>response.json())
    .then(data =>displayResults(data));
}

function displayResults(data){
    if (listSearch.firstChild){
        while(listSearch.firstChild){
            listSearch.removeChild(listSearch.firstChild)
        }
    } 
    data.forEach(element => {
        if(element.includes(".")){
            const li = document.createElement("li");
            li.innerHTML="<a href="+element+">"+element+"</a>";
            listSearch.appendChild(li);   
           } else{
            var file = element.split("/");
            var fileName = file[file.length-1];
            const li = document.createElement("li");
            li.innerHTML="<a href=?name="+fileName+">"+fileName+"</a>";
            listSearch.appendChild(li);
           }
        
        });
        }