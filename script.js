const createBttn = document.querySelector("#create-bttn");
let contentElements = document.querySelector("#created-elements");

createBttn.addEventListener("click", newElementCreated);


function newElementCreated(e) {
    e.preventDefault();
    let hola = {};
    fetch("functions.php", {
        method: 'POST',
        body: JSON.stringify(hola)
    })
    .then((res) => res.json())
    .then((data) => {
        // contentElements.innerHTML = data;
        prueba()
    
    })
}

function prueba(){
    console.log("hola");
}

