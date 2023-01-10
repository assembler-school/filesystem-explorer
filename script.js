const createBttn = document.querySelector("#create-bttn");
let contentElements = document.querySelector("#created-elements");
createBttn.addEventListener("click", newElementCreated);
function newElementCreated(e) {
    e.preventDefault();
    fetch("functions.php", {
        method: 'POST',
    })
    .then((res) => res.json())
    .then((data) => {
        contentElements.innerHTML = data;
        
    
    })
}

