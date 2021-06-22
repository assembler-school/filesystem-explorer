<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <title>FileSystem Explorer</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">

                    <div class="card-body" style="width: 12rem;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            + Add Directory
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label> -->
                                        <form action="./modules/create_directory.php" method="post">
                                            <!-- <input type="submit" class="btn btn-primary" value="+ Add File"> -->
                                            <input type="text" id="defaultForm-name" name="directory-name" placeholder="Insert directory name" class="form-control validate">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->

                        <h5 class="my-3">File Explorer</h5>
                        <div class="fm-menu">
                            <div class="list-group list-group-flush"> <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-folder me-2"></i><span>All Files</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-devices me-2"></i><span>Root</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-analyse me-2"></i><span>Documents</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-plug me-2"></i><span>Images</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-plug me-2"></i><span>Audio</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-plug me-2"></i><span>Video</span></a>
                                <a href="javascript:;" class="list-group-item py-1"><i class="bx bx-trash-alt me-2"></i><span>Deleted Files</span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="fm-search">
                    <div class="mb-0">
                        <div class="input-group input-group-lg"> <span class="input-group-text bg-transparent"><i class="fa fa-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search the files">
                        </div>
                    </div>
                </div>
                <div>INSERTAR DATOS PHP BRAHIM - f03 list fileeeeee</div>
            </div>
        </div>
    </div>
</body>

</html>