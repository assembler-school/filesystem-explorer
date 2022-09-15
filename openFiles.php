<?php 

function openFiles ($url) {


    $filter = pathinfo($url, PATHINFO_EXTENSION);

    switch($filter){
    
        case "png":
            $imageData = base64_encode(file_get_contents($url));
            $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
            echo '<img src="' . $src . '">';
                break;

            case "jpg":
                $imageData = base64_encode(file_get_contents($url));
                $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
                echo '<img src="' . $src . '" width="500px">';
                break;
            case "JPG":
                $imageData = base64_encode(file_get_contents($url));
                $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
                echo '<img src="' . $src . '" width="500px">';
                break;
                case "mp4":
                    $imageData = base64_encode(file_get_contents($url));
                    $src = 'data: '.mime_content_type($url).';base64,'.$imageData;
                    echo '<video controls="" width="800">
                    <source src="' . $src . '" type="video/mp4">
                     </video>';
                        break;

            case "pdf":
                $filePDF = $url;
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="' . $filePDF . '"');
                header("Content-Length: " . filesize($filePDF));
                readfile($url);

        default:
            $fileO = file_get_contents($url);
            echo $fileO;
            break;
    
        

    }
}