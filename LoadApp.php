<?php
define("ROOT", "./root");

function loadFiles($parent, $path)
{
    $files = array_diff(scandir($path), array('.', '..'));
    if (substr_count($path, "/") > 1) {
        paintBackDir($parent);
    }
    foreach ($files as $file) {
        paintFile($path, $file);
    }
};

function paintFile($path, $file)
{
    if (is_dir($path . "/" . $file)) {
        if (isset($_REQUEST['p'])) {
?>
            <tr>
                <td>
                    <a class="folder-btn" href="?p=<?php echo $_REQUEST['p'] . '/' . $file ?>"><?php echo $file ?></a>
                </td>
                <td><?php echo filetype($path . '/' . $file) ?></td>
                <td><?php echo filesize($path . '/' . $file) ?></td>
                <td><?php echo filemtime($path . '/' . $file) ?></td>
                <td></td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td>
                    <a class="folder-btn" href="?p=<?php echo $file ?>"><?php echo $file ?></a>
                </td>
                <td><?php echo filetype($path . '/' . $file) ?></td>
                <td><?php echo filesize($path . '/' . $file) ?></td>
                <td><?php echo filemtime($path . '/' . $file) ?></td>
                <td></td>
            </tr>
        <?php
        }
    } else {
        ?>
        <tr>
            <td><?php echo $file ?></td>
            <td><?php echo filetype($path . '/' . $file) ?></td>
            <td><?php echo filesize($path . '/' . $file) ?></td>
            <td><?php echo filemtime($path . '/' . $file) ?></td>
            <td></td>
        </tr>
    <?php
    }
};

function paintBackDir()
{
    $parent = getParent()
    ?>
    <tr>
        <td>
            <a class="folder-btn" href="?p=<?php echo $parent ?>">..</a>
        </td>
        <td></td>
    </tr>
<?php
}

function getParent()
{
    $path = $_REQUEST['p'];
    $str_arr = explode("/", $path);
    array_pop($str_arr);
    $string = implode("/", $str_arr);
    return $string;
}
?>