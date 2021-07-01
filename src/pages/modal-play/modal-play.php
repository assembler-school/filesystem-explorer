
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





