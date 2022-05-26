const getFiles = async () => {
  const response = await fetch(
    "http://localhost:8080//Managizer-filesystem-explorer/src/modules/main.php",
    { mode: "no-cors" }
  );
  const files = await response.json();

  return Object.values(files);
};

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
};

const createFileCard = (fileName, imageSrc) => {
  const colEl = document.createElement("div");
  colEl.className = "col";

  const cardEl = document.createElement("div");
  cardEl.className = "card";

  const cardImageEl = document.createElement("img");
  cardImageEl.src = imageSrc;
  cardImageEl.className = "card-img-top";

  const cardBodyEl = document.createElement("div");
  cardBodyEl.className = "card-body";

  const cardTitleEl = document.createElement("h5");
  cardTitleEl.textContent = fileName;
  cardTitleEl.className = "card-title";

  colEl.appendChild(cardEl);
  cardEl.appendChild(cardImageEl);
  cardEl.appendChild(cardBodyEl);
  cardBodyEl.appendChild(cardTitleEl);

  return colEl;
};

const getFileInfo = (file) => {
  const ext = file.split(".");
  const fileName = ext[0];
  const iconSrc = fileIcons[ext[1]];
  const fileWrapperEl = document.getElementById("files-wrapper");
  const newFileCard = createFileCard(fileName, iconSrc);

  newFileCard.addEventListener("click", (e) => {
    const previewImage = document.getElementById("preview-image");
    const previewTitle = document.getElementById("preview-title");
    const cardEl = e.currentTarget;

    const currentImage = cardEl.querySelector("img").src;
    const currentTitle = cardEl.querySelector("h5").textContent;

    previewImage.src = currentImage;
    previewTitle.textContent = currentTitle;
  });

  fileWrapperEl.appendChild(newFileCard);
};

const showFiles = async () => {
  const allFiles = await getFiles();
  allFiles.map((file) => {
    getFileInfo(file);
  });
};

showFiles();
