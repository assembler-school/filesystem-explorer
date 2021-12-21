function obtenerdatos(elem){
    const url= elem;
    fetch( url )
    .then(respuesta => {
        linkfile = respuesta.url;
        return linkfile
    })
    console.log(linkfile);
    appendfile(linkfile)

}


function appendfile(elem){
    var asidefile= document.getElementById('asidefile');
    console.log(asidefile);
    
    var content = `<img src="${elem}" alt="no detecta">`;
    // content+= `<h4>${elem}</h4>`
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