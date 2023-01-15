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
    console.log(formData)
    console.log(dataPath)
    fetch('modules/uploadFiles.php?dataPath=' + dataPath, {
            method: "POST",
            body: formData
        }).then((response) => response.json())
        .then((data) => {
            console.log(data);
            if(dataPath!=""){
                printFilesSecondChild();
            } /* else {
            printFilesFirstChild();
            } */
        })
        .catch((err) => console.log("Request failed: ", err));
}

/* function printFilesFirstChild(){ No funciona porque ese archivo esta sujeto a index y devuelve echo. Necesitamos crar otro php justo para este que devuelve un array e imprimirlo.
    fetch('modules/printFilesFirstChild.php', {
        method: "POST",
    }).then((response) => response.json())
    .then((data) => {
    })
    .catch((err) => console.log("Request failed: ", err));
} */

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