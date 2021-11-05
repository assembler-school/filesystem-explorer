  <!-- Modal -->
  <div class="modal fade" id="renameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Rename file</h5>
                  <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="alert alert-primary" role="alert">
                      <form id="formRenameFile" class="mb-0" action="" method="post" enctype="multipart/form-data">
                          Rename:
                          <input type="text" name="file" id="file" value="gsggs">

                          <div class="modal-footer">
                              <input type="submit" class="btn btn-success" value="Rename" name="submit" data-bs-dismiss="modal">
                          </div>
                      </form>
                  </div>

              </div>

          </div>
      </div>
  </div>
<script>
	    $(document).ready(function(){
        $("#formRenameFile").submit(function(e){
            e.preventDefault();

            $.ajax({
                url:"../../app/php/renameFile.php",
                type:"post",
                data: {filePath:fileUrl},
                success: function(response) {
                    // if(response) {
                    //     Swal.fire({
                    //     icon: "success",
                    //     title: "File renamed",
                    //     showConfirmButton: false,
                    //     timer: 1500,
                    //     });
                    //     loadTable();
                    // } else {
                    //     Swal.fire({
                    //     icon: "error",
                    //     title: "Oops...",
                    //     text: "Something went wrong!",
                    //     });
                    // }
                }
            })
        })
    })
</script>