<?php
$search = $_GET["q"];
$arrayFolder = array();
$arrayFile = array();

foreach(glob("root/*") as $result){
    array_push($arrayFolder, $result);
    foreach (glob("$result/*") as $file){
        array_push($arrayFile, $file);
    }
}

function array_search_partial($arr, $keyword) {
    $arrayResultSearch = array();
    foreach($arr as $index => $string) {
        if (stripos($string, $keyword) !== FALSE){
            array_push($arrayResultSearch, $index);
        }    
    }
    return $arrayResultSearch;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Welcome</title>
</head>
<body>
    <header>
        <nav id="navigation">
            <div id="logo"> 
                <a href='./root'>
                    <img src="./image/logoNew.png" alt="Logo" id="logo-panel">
                </a>
            </div>
            <div id="search"> 
            <form method="GET" action="search.php">
                <input type="text" name="q" value='<?php echo $search;?>' class="search" placeholder="Search">
            </form>
            </div>
            <div id="user"> 
            <a href="../assets/close-session.php">
                <button>Sign out</button>
            </a>
            </div>
        </nav>
    </header>
    <section class="pop-up-file hidden">
            <div class="close-popup-file" id="close-popup"><i class="fa-solid fa-xmark"></i></div>
            <div id="view-content"> </div>
            <div class="cover"></div>
    </section>
    <main class="search-main">
        <section class="view-files">

        <?php
        $indexFile = array_search_partial($arrayFile, $search);
        $indexFolder = array_search_partial($arrayFolder, $search);

        if(sizeof($indexFolder) >= 1){
            echo '<h1>Search Results</h1>';
            foreach($indexFolder as $folderResult){
                $positionSlashFolder = strpos($arrayFolder[$folderResult], "/");
                $folderWithoutSlash = substr($arrayFolder[$folderResult], $positionSlashFolder);

                if(sizeof($indexFile) >= 1){
                    echo '<div class="complete-path-search">
                    <div class="folder-search">'.$folderWithoutSlash."</div>";

                    foreach($indexFile as $indexResult){
                        $positionSlash = strpos($arrayFile[$indexResult], "/", 5);
                        $fileWithoutSlash = substr($arrayFile[$indexResult], $positionSlash + 1);

                        if(strpos($arrayFile[$indexResult], $arrayFolder[$folderResult]) !== false){
                            echo '<div class="file-search" filePath="'.$arrayFile[$indexResult].'">'. $fileWithoutSlash .'</div>';
                            continue;
                        }       

                        echo '<div class="file-search no-folder" filePath="'.$arrayFile[$indexResult].'">'. $fileWithoutSlash .'</div>';
                        
                    }

                    echo '</div>';
                }else{
                    echo '<div class="complete-path-search">
                    <div class="folder-search">'
                    .$folderWithoutSlash.
                    '</div>
                    </div>';

                }
            }
        }else{
            if(sizeof($indexFile) === 0){
            echo "<h1>Upppsss!! We couldn't find this file or folder 😔</h1>";
            }else{
                echo '<h1>Search Results</h1>';
                foreach($indexFile as $indexResult){
                    $positionSlashFile= strpos($arrayFile[$indexResult], "/", 5);
                    $fileWithoutSlash = substr($arrayFile[$indexResult], $positionSlashFile);
                    echo '<div class="file-search no-folder" filePath="'.$arrayFile[$indexResult].'">'.$fileWithoutSlash."</div>";
                }
            }
        }  
        ?>
        </section>
        </main>
        <script src="assets/js/results.js"></script>
</body>