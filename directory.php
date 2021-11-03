<div class="path__container">
    <?php
    if (isset($_GET["directory"])) {
        $test = explode("/", $_GET["directory"]);
        $test = array_shift($test);
    }

    echo isset($test);
    echo $test;
    ?>
    <?php isset($test) ? "<a href=" . $test . ">" : "<a href='root'>" ?>
    <button>
        Back</button> </a>
    <button>></button>
    <div>path</div>

</div>