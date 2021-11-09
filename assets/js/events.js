import { ROOT_DIRECTORY } from "./config.js";

function setInputValueEvent(inputTargetSelector, eventTargetAction) {
	const input = document.querySelectorAll(inputTargetSelector);

	if (!input) return;

	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== eventTargetAction) return;

    input.forEach(elm => {
      elm.value = event.target.dataset.payload;  
    });

		console.log(event.target.dataset.payload);
	});
}

function setImageEvent() {
	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "view-image") return;

		const container = document.querySelector("#view-file");
		const image = document.createElement("img");
		image.classList.add("w-100");
		image.src = `${ROOT_DIRECTORY}/${event.target.dataset.payload}`;

		container.innerHTML = null;
		container.insertAdjacentElement("afterbegin", image);
	});
}

function setVideoEvent() {
	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "view-video") return;

		const container = document.querySelector("#view-file");
		const video = document.createElement("video");
		video.classList.add("w-100");
		video.src = `${ROOT_DIRECTORY}/${event.target.dataset.payload}`;
		video.controls = true;

		container.innerHTML = null;
		container.insertAdjacentElement("afterbegin", video);
	});
}

function setEditFile() {
  document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "edit-file") return;
    
    // Get txt content
    const filePath = event.target.dataset.payload
    fetch('../../actions/editFile/get.php', {
      method: 'POST',
      headers:{
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        "filePath": filePath
      })
    })
    .then(res => res.json())
    .then(data => {
      document.querySelector("#dataFile").value = data
    })

    document.querySelector("#formEditFile").addEventListener('submit', e => {
      e.preventDefault();

      fetch('../../actions/editFile/put.php', {
        method: 'POST',
        headers:{
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          "filePath": filePath,
          "data": document.querySelector("#dataFile").value
        })
      })
      .then(res => res.json())
      .then(data => {
        if (data !== false || data !== 'false') {
          return document.querySelector("#clodeEditModal").click();
        }
      })
    })

	});
}

export { setInputValueEvent, setImageEvent, setVideoEvent, setEditFile };
