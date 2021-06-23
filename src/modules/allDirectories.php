<?php
$dirs = array_filter(glob('./root/*'), "is_dir");
echo "All directories in current directory";
echo "<pre>" . print_r($dirs, true) . "</pre>";
