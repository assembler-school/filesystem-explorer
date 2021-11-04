<table id="table_id" class="table table-responsive table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Create</th>
            <th>Modify</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $arrayFile = glob('../../storage/*', GLOB_BRACE);

        foreach ($arrayFile as $file) {
            $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $fileName =  basename($file);
            $fileCreate =  date("Y-m-d H:m:s", fileatime($file));
            $fileModify =  date("Y-m-d H:m:s", filemtime($file));
            echo ' <tr>' .
                ' <td> ' . $fileName . ' </td> ' .
                ' <td> ' . $fileType . ' </td>' .
                ' <td> ' . $fileCreate . ' </td>' .
                ' <td> ' . $fileModify . ' </td>' .
                ' <td> ' . '$fileModify' . ' </td>' .
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