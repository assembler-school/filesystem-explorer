<?php
function getFiles($dir)
{
    $listOfFiles = scandir($dir);

    unset($listOfFiles[array_search('.', $listOfFiles)]);
    unset($listOfFiles[array_search('..', $listOfFiles)]);


    echo json_encode($listOfFiles);
    // print_r($listOfFiles);

    // print_r($ffs);
    // prevent empty ordered elements
    // if (count($listOfFiles) < 1)
    //     return;

    // echo '<ul>';

    // foreach ($listOfFiles as $ff) {
    //     classifyElements($ff);
    //     // echo "<li data-dir={$dir}{$ff}>" . $ff;
    //     if (is_dir($dir . '/' . $ff)) {
    //         setFolder($ff);
    //         // getFiles($dir . '/' . $ff);
    //     }
    //     echo '</li>';
    // }
    // echo '</ul>';
}

getFiles("../root/");
function classifyElements($file)
{

    $fileExten = explode('.', $file);
    $fileActExt = strtolower(end($fileExten));



    if ($fileActExt === 'png' || $fileActExt === 'jpeg' || $fileActExt === 'jpg') {
        echo " <div style=' display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/2175/premium/2175217.png?token=exp=1653559414~hmac=720b38537fd129df1be2e7e2156abde0' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'mp3') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337944.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'txt') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/2656/premium/2656402.png?token=exp=1653560261~hmac=939855a08252eb08912e97fb72134ced' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'doc') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337932.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'csv') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/2656/premium/2656481.png?token=exp=1653559650~hmac=ad9b3360350058f3260af5c2363b0d4a' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'ppt') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337949.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'odt') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/2656/premium/2656396.png?token=exp=1653559776~hmac=c74e493142b71e54d645d53728108d0f' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'pdf') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337946.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'zip') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337960.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'rar') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/5719/premium/5719948.png?token=exp=1653559928~hmac=33dadc8bef22d20c1a7e5c44b9a5100e' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'exe') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons.flaticon.com/png/512/2656/premium/2656476.png?token=exp=1653559975~hmac=c0a9041815a7158794d35801de12fb51' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'svg') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/337/337954.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    } else if ($fileActExt === 'mp4') {
        echo " <div style='display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/2611/2611432.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
    }
}

function setFolder($file)
{
    echo " <div style=' display:flex; align-items: center'>
        <img style='height: 25px' src='https://cdn-icons-png.flaticon.com/512/3767/3767084.png' alt='img-icon' > 
        <p>{$file}</p>
            </div>
        ";
}
