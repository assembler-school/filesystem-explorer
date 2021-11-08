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

function editFile() {
  document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "edit-file") return;

		const container = document.querySelector("#view-file");
		const video = document.createElement("video");
		video.classList.add("w-100");
		video.src = `${ROOT_DIRECTORY}/${event.target.dataset.payload}`;
		video.controls = true;

		container.innerHTML = null;
		container.insertAdjacentElement("afterbegin", video);
	});
}

export { setInputValueEvent, setImageEvent, setVideoEvent };
