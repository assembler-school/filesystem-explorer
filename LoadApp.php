<?php

function loadFiles()
{
    $path    = './root';
    $files = array_diff(scandir($path), array('.', '..'));
    foreach ($files as $file) { ?>
        <tr>
            <td><?php echo $file ?></td>
            <td></td>
        </tr>
        <?php
    }
};

function paintFile($file)
{ ?>

<?php
};
?>