function setInputValueEvent(inputTargetSelector, eventTargetAction) {
	const input = document.querySelector(inputTargetSelector);

	if (!input) return;

	document.addEventListener("click", function (event) {
		if (event.target.dataset?.action !== eventTargetAction) return;

		input.value = event.target.dataset.payload;
		console.log(event.target.dataset.payload);
	});
}

export { setInputValueEvent };
