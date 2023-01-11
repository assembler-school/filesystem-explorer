let contentFile = document.querySelectorAll(".file-search");
contentFile.forEach((item)=>{
    item.addEventListener("click", showInfoElement)});


function showInfoElement(event){
    let atrituboFile = event.srcElement.getAttribute("filePath")
    let cutExtension = atrituboFile.lastIndexOf(".");
    let pathExtension = atrituboFile.slice(cutExtension+1);

    let formatImg = ["jpg", "png", "webp"];

    if(formatImg.includes(pathExtension)){
        pathExtension = "img";
    }
    switch(pathExtension){
        case "txt":
            let pathTxt = "../"+atrituboFile;
            fetch ("assets/display-info-file.php?filePath="+pathTxt)
            .then (response => response.json())
            .then (data => createFileContent("txt", data))
            
            break
        case "img":
            createFileContent("img", atrituboFile);
            break
        case "mp4":
            createFileContent("mp4", atrituboFile);
            break
        case "mp3":
            createFileContent("mp3", atrituboFile);
            break
        default:
        console.log("no podemos descargar este archivo")
        break
    }
}

function createFileContent(typeFile, data){
    const containerContent = document.querySelector("#view-content");

    while(containerContent.firstChild){
        containerContent.removeChild(containerContent.lastChild);
    }
    if(typeFile === "txt"){
        
        let elementTxt = document.createElement("div");
        elementTxt.textContent = data;
        containerContent.appendChild(elementTxt);
    
    } else if(typeFile === "img"){
        let elementImg = document.createElement("img");
        elementImg.src = data;
        containerContent.appendChild(elementImg);

    } else if(typeFile === "mp4"){
        let elementVideo = document.createElement("video");
        elementVideo.controls = true;
        let elementSource = document.createElement("source");
        elementSource.src = data;
        elementSource.setAttribute("type", "video/mp4");
        containerContent.appendChild(elementVideo);
        elementVideo.appendChild(elementSource);

    } else if(typeFile === "mp3"){
        let elementAudio = document.createElement("audio");
        elementAudio.controls = true;
        let elementAudioSource = document.createElement("source");
        elementAudioSource.src = data;
        elementAudioSource.setAttribute("type", "audio/mpeg");
        containerContent.appendChild(elementAudio);
        elementAudio.appendChild(elementAudioSource);
}
}