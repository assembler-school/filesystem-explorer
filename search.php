<?php
$search = $_GET["q"];
$array = array();
$arrayTwo = array();


foreach(glob("root/*") as $result){
    array_push($array, $result);
foreach (glob("$result/*") as $file){
    array_push($arrayTwo, $file);
    /* $arrayTwo["$result"][] += $file; */
}
};
$res = array_merge($array, $arrayTwo); 
function array_search_partial($arr, $keyword) {
    $arrayResultSearch = array();
    foreach($arr as $index => $string) {
        if (stripos($string, $keyword) !== FALSE){
            /* echo $index; */
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
                <img src="./image/logo.webp" alt="Logo" id="logo-panel">
            </div>
            <div id="search"> 
            <form method="GET" action="search.php">
            <input type="text" name="q" class="search" placeholder="Search">
            </form>
            </div>
            <div id="user"> 
            <img src="" alt="User image">
            </div>
</nav>
</header>
<main class="search-main">
    <section id="view-files">

<?php
$indexFile = array_search_partial($arrayTwo, $search);
if(sizeof($indexFile) === 0){
    echo "No results";
}
foreach($indexFile as $indexResult){
    echo $arrayTwo[$indexResult]."</br>";
}

?>
</section>

<section it="view-content">

</section>

</main>
</body>