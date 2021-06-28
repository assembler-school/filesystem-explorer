<?php
$searched=$_POST['file'];
$existingDirs=scandir("../directories");
$itExist=file_exists("../directories/$searched");
if($itExist){
    $response=$searched;
}else{
    foreach($existingDirs as $dir ){
        $itExist=file_exists("../directories/$dir/$searched");
            if($itExist){
                $response=$searched;
                break;     
            }else{
                foreach( $dir as $subDir){
                    $itExist=file_exists("../directories/$dir/$subDir/$searched");
                    if($itExist){
                        $response=$searched;
                        break;
                    }else{
                        $response="non found";
                    }
                }
            }

    };
}
 header("Location:../root.php?$foundedFile=$response");