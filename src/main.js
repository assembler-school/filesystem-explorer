// const getFiles = async () => {
//   const response = await fetch(
//     "http://192.168.64.2/Managizer-filesystem-explorer/src/modules/main.php",
//     { mode: "no-cors" }
//   );
//   const files = await response.json();

//   return Object.values(files);
// };

const fileIcons = {
  doc: "../src/assets/doc.png",
  csv: "../src/assets/archivo-csv.png",
  jpg: "../src/assets/jpg.png",
  png: "../src/assets/png.png",
  txt: "../src/assets/archivo-txt.png",
  ppt: "../src/assets/png.png",
  odt: "../src/assets/archivo-odt.png",
  pdf: "../src/assets/pdf-file.png",
  zip: "../src/assets/archivo-zip.png",
  rar: "../src/assets/archivo-rar.png",
  exe: "../src/assets/exe.png",
  svg: "../src/assets/archivo-csv.png",
  mp3: "../src/assets/archivo-mp3.png",
  mp4: "../src/assets/mp4.png",
  folder: "../src/assets/folder.png"
};

const showIcons = () => {
  const h5El = document.querySelectorAll('[data-type]');
  h5El.forEach(element => {
    const arrayH5 = element.textContent.split('.');
    const ext = arrayH5[arrayH5.length - 1];
    const img = element.parentElement.previousElementSibling
    if (ext.length == 3) {
      img.src = fileIcons[ext];
    } else {
      img.src = fileIcons.folder;
     
    }
   
  
  })
}

showIcons()
// const createFileCard = (fileName, imageSrc) => {
//   const colEl = document.createElement("div");
//   colEl.className = "col";

//   const cardEl = document.createElement("div");
//   cardEl.className = "card";

//   const cardImageEl = document.createElement("img");
//   cardImageEl.src = imageSrc;
//   cardImageEl.className = "card-img-top";

//   const cardBodyEl = document.createElement("div");
//   cardBodyEl.className = "card-body";

//   const cardTitleEl = document.createElement("h5");
//   cardTitleEl.textContent = fileName;
//   cardTitleEl.className = "card-title";

//   const openFileBtnEl = document.createElement('input');
//   openFileBtnEl.setAttribute('type', 'submit')
//   openFileBtnEl.setAttribute('name', 'open')
//   openFileBtnEl.textContent = "open file";
  

//   colEl.appendChild(cardEl);
//   cardEl.appendChild(cardImageEl);
//   cardEl.appendChild(cardBodyEl);
//   cardBodyEl.appendChild(cardTitleEl);
//   cardBodyEl.appendChild(openFileBtnEl);

//   return colEl;
// };

// const getFileInfo = (file, size, modifiedDate) => {
//   const fileSlpit = file.split(".");
//   const ext = fileSlpit[fileSlpit.length - 1];
//   const fileName = fileSlpit.shift();
//   const iconSrc = fileIcons[ext];
//   const fileWrapperEl = document.getElementById("files-wrapper");
//   const newFileCard = createFileCard(fileName, iconSrc);

//   newFileCard.addEventListener("click", (e) => {
//     const previewImage = document.getElementById("preview-image");
//     const previewTitle = document.getElementById("preview-title");
//     const fileSize = document.getElementById("fileSizePreview");
//     const fileLastModified = document.getElementById("fileLastModified");
//     const fileExtPreview = document.getElementById("fileExtensionPreview");

//     const cardEl = e.currentTarget;

//     const currentImage = cardEl.querySelector("img").src;
//     const currentTitle = cardEl.querySelector("h5").textContent;

//     previewImage.src = currentImage;
//     previewTitle.textContent = currentTitle;
//     fileSize.textContent = `Size: ${size} bytes`;
//     fileLastModified.textContent = ` Last modified: ${modifiedDate}`;
//     fileExtPreview.textContent = `Extension: ${ext}`;
//   });

//   fileWrapperEl.appendChild(newFileCard);
// };

// const showFiles = async () => {
//   const allFiles = await getFiles();
//   allFiles.map((fileArray) => {
//     // console.log(Object.values(fileArray));
//     console.log(fileArray[0]);
//     getFileInfo(fileArray[0], fileArray[1], fileArray[2]);
//   });
// };

// showFiles();

