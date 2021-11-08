function setInputValueEvent(inputTargetSelector, eventTargetAction) {
	const input = document.querySelector(inputTargetSelector);

	if (!input) return;

	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== eventTargetAction) return;

		input.value = event.target.dataset.payload;
		console.log(event.target.dataset.payload);
	});
}

function setImageEvent() {
	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "view-image") return;

		const container = document.querySelector("#view-file");
		const image = document.createElement("img");
		image.classList.add("img-styles");
		image.src = event.target.dataset.payload;

		container.innerHTML = null;
		container.container.insertAdjacentElement("afterbegin", image);
	});
}

function setVideoEvent() {
	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== "view-image") return;

		const container = document.querySelector("#view-file");
		const video = document.createElement("video");
		video.classList.add("video-styles");
		video.src = event.target.dataset.payload;
		video.controls = true;

		container.innerHTML = null;
		container.container.insertAdjacentElement("afterbegin", video);
	});
}

export { setInputValueEvent, setImageEvent, setVideoEvent };
