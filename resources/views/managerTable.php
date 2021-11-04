<table id="table_id" class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <th>Folder</th>
            <th>Name</th>
            <th>Type</th>
            <th>Create</th>
            <th>Modify</th>
            <th>Size</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $arrayFile = glob('../../storage/*', GLOB_BRACE);

        foreach ($arrayFile as $file) {
            $fileFolder = str_replace(dirname($file), '../../storage', '/');
            $fileName =  basename($file);
            $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $fileCreate =  date("Y-m-d H:m:s", fileatime($file));
            $fileModify =  date("Y-m-d H:m:s", filemtime($file));

            $fileSizeB = filesize($file);
            if ($fileSizeB >= 0) {
                $fileSize = $fileSizeB / 1024;
                $format = "Kb";
                if ($fileSize >= 1024) {
                    $fileSize = $fileSize / 1024;
                    $format = "Mb";
                    if ($fileSize >= 1024) {
                        $fileSize = $fileSize / 1024;
                        $format = "Gb";
                    }
                }
            }
            echo ' <tr>' .
                ' <td> ' . $fileFolder . ' </td>' .
                ' <td> ' . $fileName . ' </td> ' .
                ' <td> ' . $fileType . ' </td>' .
                ' <td> ' . $fileCreate . ' </td>' .
                ' <td> ' . $fileModify . ' </td>' .
                ' <td> ' . round($fileSize, 2) . $format . ' </td>' .
                ' <td> ' . 'ACTIONS' . ' </td>' .
                '</tr> ';
            # code...
        }
        ?>
    </tbody>
</table>



<script type="text/javascript">
    //! datatable
    $(document).ready(function() {

        $('#table_id').DataTable({
            columnDefs: [{
                targets: [0],
                orderData: [0, 1]
            }, {
                targets: [1],
                orderData: [1, 0]
            }, {
                targets: [4],
                orderData: [4, 0]
            }]
        });
    });
</script>