const uploadFile = document.querySelector("#uploadFile");
const inputUploadFile = document.querySelector("#inputUploadFile");

uploadFile.addEventListener("click", uploadFileFunction);
inputUploadFile.addEventListener('change', () => {
    upload_image(inputUploadFile.files[0]);
});

function uploadFileFunction() {
    inputUploadFile.click();
}

const upload_image = (file) => {
    let formData = new FormData();
    formData.append("inputUploadFile", file);
    fetch('modules/uploadFiles.php?dataPath=' + dataPath, {
            method: "POST",
            body: formData
        }).then((response) => response.json())
        .then((data) => {
            data.forEach(element =>
                console.log(element));
            if(dataPath!=""){
                printFilesSecondChild();
            } else {
                appendUploadedFile(data);
            }
        })
        .catch((err) => console.log("Request failed: ", err));
}

function appendUploadedFile(data){
    if (data[2]=="jpeg"){
        data[2]="jpg";
    }
    li = document.createElement("li");
    li.setAttribute("class", "first-list");
    li.setAttribute("data-path", data[1]+"/");
    li.setAttribute("type", "file");
    const img = document.createElement("img");
    img.setAttribute("src", "images/"+data[2]+"Icon.png");
    img.setAttribute("alt", "file");
    img.classList.add("folder-list-img");
    const span = document.createElement("span");
    span.classList.add("text-list");
    span.textContent = data[1];
    li.appendChild(img);
    li.appendChild(span);
    filesList.appendChild(li);
}

/* function submitFunction() {
    let photo = inputUploadFile.files[0];
    let name = inputUploadFile.value;
    console.log(photo)
    console.log(name)
    let formData = new FormData();
    formData.append("inputUploadFile", photo);
    console.log(formData)
    fetch('modules/uploadFiles.php?dataPath=' + dataPath, {
            method: "POST",
            body: formData
        }).then((response) => response.json())
        .then((data) => {
            console.log(data);
        })
        .catch((err) => console.log("Request failed: ", err));
} */