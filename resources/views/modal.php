  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add file</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="alert alert-primary" role="alert">
                      <form class="mb-0" method="post" id="uploadForm" enctype="multipart/form-data">
                          Select a file to upload:
                          <input type="file" name="fileToUpload" id="fileToUpload">
                          <div class="modal-footer">
                              <input class="btn btn-secondary" value="close" data-bs-dismiss="modal">
                              <input type="submit" name="upload" value="Upload" class="btn btn-primary">
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <script src="../../app/js/loadTable.js"></script>
  <script>
      import {
          loadTable
      } from "../../app/js/loadTable.js";
      $(document).ready(function() {
          // document.getElementById('nombreFormula').add
          $('#uploadForm').submit(function(e) {
              e.preventDefault();
              $.ajax({
                  type: "POST",
                  url: "../../app/php/upload.php",
                  data: $(this).serialize(),
                  success: function() {
                      loadTable()
                  },
                  error: function() {
                      alert("error")
                  }
              });
          });
      });
  </script>