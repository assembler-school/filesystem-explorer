<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteFileModal">
  Launch demo modal
</button>

<!-- Delete file modal -->
<div class="modal fade" id="deleteFileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <p class="detelePostText">Are you sure you want to delete this file?</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-search">Yes</a>
        <button type="button" class="btn btn-new-folder" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
