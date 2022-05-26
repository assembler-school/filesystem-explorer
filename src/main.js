const getFiles = async () => {
  const response = await fetch(
    "http://localhost:8080/Managizer-filesystem-explorer/src/modules/main.php"
  );
  const files = await response.json();
  console.log(files);
};

getFiles();
