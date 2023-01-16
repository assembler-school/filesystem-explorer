// let camposForm = document.querySelector('.create-form').elements;
// let prueba = document.querySelector('#prueba');

// let btn = document.querySelector('.refresh');

// btn.addEventListener('click', function(e){
// e.preventDefault();
// let formData ={};

// for(let i = 0; i< camposForm.lenght; i++){
// 	formData[camposForm[i].name] = camposForm[i].value;
// }

// let datos = formData;
// fetch('CRUD/create.php',{
// 	method:'POST',
// 	body:JSON.stringify(datos)
// })
// .then(function(response) {
//             if (response.ok) {
//                 prueba.innerHTML = "se ha creado el archivo";
                
//             } else {
//                 prueba.innerHTML = "Ha ocurrido un error";
//             }
//         });

// })




// const createBttn = document.querySelector("#create-bttn");
// let contentElements = document.querySelector("#created-elements");

// createBttn.addEventListener("click", newElementCreated);


// function newElementCreated(e) {
//     e.preventDefault();

//     var datos = new FormData();

//     fetch("upload.php", {
//         method: 'POST',
//         body: datos,
//         headers: {
//             "Content-Type": "application/json"
//           }
//     })
//     .then((res) => res.json())
//     .then((data) => {
//         console.log(data);
       
    
//     })
// }


