function obtenerdatos(elem){
    console.log("kjaskjdna")
    console.log(elem)
    // const url= elem;
    // console.log(elem)
    fetch(elem)
    .then(respuesta => {
        return respuesta
    }).then(datos => {
        console.log(datos.url)
        appendfile(datos.url)
    })
    // console.log(linkfile);

}


function appendfile(elem){
    asidefile= document.getElementById('asidefile');
    console.log(asidefile);
    // asidefile.innerHTML=""
    content=`<iframe src="${elem}" title="W3Schools Free Online Web Tutorials" width="640" height="480"></iframe>`
    asidefile.innerHTML = content;
};

// function printhere(elem){
//     //console.log(elem)
//     var retornar = 
    
    
//     // $.ajax({
//     //     type: "GET",
//     //     url: "./tryUno.php",
//     //     data: { functionname: "truOne", arguments: [elem] },
//     //     success: function (response) {
//     //         console.log('aklsjdblfkjabs')
//     //     }
//     // });
//     console.log(retornar);
//     return retornar;

// }
