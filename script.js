

//------------------------ CREATE FOLDER -----------------------------

const createFolder = document.querySelector('.create-btn');
const folderNameToCreate = document.querySelector('.folder-name');

createFolder.addEventListener("click", createNewFolder);

let folder = document.querySelectorAll(".folder");

folder.forEach( element => element.addEventListener("click", nameFolder));

let nombre = "";

function nameFolder(e){
    nombre = e.srcElement.getAttribute("value");
    console.log(nombre);
    return nombre;
}

function createNewFolder() {

    // fetch("check-request.php")
    //     .then(response => response.json())
    //     .then(data => nombre = data)

    let folderName = folderNameToCreate.value;

    if (nombre === "") {

        fetch ("../filesystem-explorer/create-folder.php?nameFolder="+folderName)
            .then(response => response.json())
            .then(data => console.log(data))

    } else {

        fetch ("../filesystem-explorer/create-folder.php?nameFolder="+folderName+"&name="+nombre)
            .then(response => response.json())
            .then(data => console.log(data))
    }
    
    window.location.reload();
}

// -------------------- DELETE FILES & FOLDERS ----------------------

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
        if (!actualFolderName.includes(".")) {
            
            fetch("delete-folder.php?actualFolderName=./"+actualFolderName)
                .then(response=>response.json())
                .then(data =>console.log(data));
        } else {
            fetch("delete-file.php?actualFolderName=./"+actualFolderName)
                .then(response=>response.json())
                .then(data =>console.log(data));
        }
    }
    window.location.reload();
}

// ------------------- MODIFY FOLDER -------------------

const edit = document.querySelectorAll(".edit-btn");

for (let i of edit){
    i.addEventListener("click", editName);
    let oldname = i.getAttribute("actualFolder");
}

// -------------- EDIT NAME -------------------------


function editName(){
    
    newname = prompt("Write the new name of the folder or file:");
    let dataform = new FormData();
    dataform.append("oldName", oldname);
    dataform.append("newname", newname);
    fetch ("./edit-folder.php",{
        method : "POST",
        body : dataform
    })
    .then(response=>response.json())
    .then(data =>console.log(data));

    window.location.reload();
}

// ------------ SEARCH FUNCTION ------------------------

const buscador = document.querySelector(".buscador");
const buscadorValue = document.querySelector(".buscadorValue");
const listSearch = document.querySelector("#searchResults");

buscador.addEventListener("click", search);

function search(e){

    e.preventDefault();
    let searchValue = buscadorValue.value;
    fetch("search.php?searchParam="+searchValue)
        .then(response=>response.json())
        .then(data =>displayResults(data));

}

function displayResults(data){

    if (listSearch.firstChild){

        while(listSearch.firstChild){

            listSearch.removeChild(listSearch.firstChild);

        }
    } 
    data.forEach(element => {

        if(element.includes(".")){

            const li = document.createElement("li");
            li.innerHTML="<a href="+element+">"+element+"</a>";
            listSearch.appendChild(li);  

           } else {

            let file = element.split("/");
            let fileName = file[file.length-1];
            const li = document.createElement("li");
            li.innerHTML="<a href=?name="+fileName+">"+fileName+"</a>";
            listSearch.appendChild(li);

           }
        
        });
    }




