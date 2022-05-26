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
  csv: null,
  jpg: null,
  png: null,
  txt: "../src/assets/pdf-file.png",
  ppt: null,
  odt: null,
  pdf: "../src/assets/pdf-file.png",
  zip: null,
  rar: null,
  exe: null,
  svg: null,
  mp3: null,
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

  fileWrapperEl.appendChild(newFileCard);
};

const showFiles = async () => {
  const allFiles = await getFiles();
  allFiles.map((file) => {
    getFileInfo(file);
  });
};

showFiles();
