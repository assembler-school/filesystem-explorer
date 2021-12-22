function obtenerdatos(elem){
    fetch(elem)
    .then(respuesta => {
        return respuesta
    }).then(datos => {
        appendfile(datos.url)
    })

}

function appendfile(elem){
    asidefile= document.getElementById('asidefile');
    console.log(asidefile);
    content=`<iframe src="${elem}" title="W3Schools Free Online Web Tutorials" width="640" height="480"></iframe>`
    asidefile.innerHTML = content;
};