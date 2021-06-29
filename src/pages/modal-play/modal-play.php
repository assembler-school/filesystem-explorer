
<template id="modalTemplate_img">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Image</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseModal"></button>
				</div>
				<div class="modal-body" id="modal-body">
					<img  width="100%" height="500px" id="img_source" src="" alt="foto">
				</div>
			</div>
		</div>
</template>

<template id="modalTemplate_video">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Video</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseModal"></button>
				</div>
				<div class="modal-body" id="modal-body">
					<video width="100%" height="500px" controls autoplay>
						<source id="video_source" src="" type="video/mp4" />
						Su navegador no soporta contenido multimedia.
					</video>
				</div>
			</div>
		</div>
</template>

<template id="modalTemplate_sound">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Sound</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseModal"></button>
				</div>
				<div class="modal-body" id="modal-body">
					<audio controls autoplay>
						<source id="sound_source" src="" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</div>
			</div>
		</div>
</template>

<template id="modalTemplate">
		<div class="modal-dialog modal-xl modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Archivo no soportado</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnCloseModal"></button>
				</div>
				<div class="modal-body" id="modal-body">
				<p id="mi_source"> Archivo no soportado por nuestro File system lo que sea</p>
				</div>
			</div>
		</div>
</template>

<script>

	let myFilesContainerListening = document.getElementById("file_container");
	let myFilesListening =
		myFilesContainerListening.querySelectorAll(".open_modal");
	let myModal = document.getElementById("exampleModalToggle");

	myFilesListening.forEach((element) => {
		element.addEventListener("dblclick", openModal);
	});

	function openModal() {
		let myId = event.target;
		let mySource = myId.dataset.source;

		const file_mp4 = ".mp4";
		const file_mp3 = ".mp3";
		const file_image_png = ".png";
		const file_img_jpg = ".jpg";

		if(mySource.includes(file_mp4)){

			let myModalSection = document.getElementById("section_modal");
			const templateContent = document.getElementById("modalTemplate_video").content;
			let templateClone = document.importNode(templateContent, true);
			myModalSection.style.display = "block";
			myModalSection.append(templateClone);
			let btnCloseModal = document.getElementById("btnCloseModal");
			btnCloseModal.addEventListener("click", closeModal);
			console.log(mySource);

			let my_source_container = document.getElementById("video_source");
			my_source_container.setAttribute("src", mySource);

		} else if (mySource.includes(file_mp3)){

			let myModalSection = document.getElementById("section_modal");
			const templateContent = document.getElementById("modalTemplate_sound").content;
			let templateClone = document.importNode(templateContent, true);
			myModalSection.style.display = "block";
			myModalSection.append(templateClone);
			let btnCloseModal = document.getElementById("btnCloseModal");
			btnCloseModal.addEventListener("click", closeModal);
			console.log(mySource);

			let my_source_container = document.getElementById("sound_source");
			my_source_container.setAttribute("src", mySource);

		} else if(mySource.includes(file_image_png) || mySource.includes(file_img_jpg)){

			let myModalSection = document.getElementById("section_modal");
			const templateContent = document.getElementById("modalTemplate_img").content;
			let templateClone = document.importNode(templateContent, true);
			myModalSection.style.display = "block";
			myModalSection.append(templateClone);
			let btnCloseModal = document.getElementById("btnCloseModal");
			btnCloseModal.addEventListener("click", closeModal);
			console.log(mySource);

			let my_source_container = document.getElementById("img_source");
			my_source_container.setAttribute("src", mySource);

		} else {

			let myModalSection = document.getElementById("section_modal");
			const templateContent = document.getElementById("modalTemplate").content;
			let templateClone = document.importNode(templateContent, true);
			myModalSection.style.display = "block";
			myModalSection.append(templateClone);
			let btnCloseModal = document.getElementById("btnCloseModal");
			btnCloseModal.addEventListener("click", closeModal);
			console.log(mySource);

		}
	}

	function closeModal() {
		let myModalSection = document.getElementById("section_modal");
		let myChilds = myModalSection.querySelector("div");
		myModalSection.style.display = "none";
		myModalSection.removeChild(myChilds);
	}

</script>



