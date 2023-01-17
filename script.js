const deleteButton = document.querySelector(".delete-button");

deleteButton.addEventListener("click", deleteBtt);

function deleteBtt(){
    fetch("CRUD/delete.php")
    .then(response => response.json())
    .then(data => console.log(data));
}
    
