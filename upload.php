<?php
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File properties
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_tmp = $file['tmp_name'];
    
    $file_error = $file['error'];

    //Work out the file extension 
    $file_ext = explode('.',$file_name);
    $file_ext = strtolower(end($file_ext));

    // Set allowed extensions 
    $allowed = array('doc','csv','jpg','png','txt','ppt','odt','pdf','zip','rar','exe','svg','mp3','mp4');  
     
    if(in_array($file_ext, $allowed)) {
        if($file_error == 0) {
            if($file_size <= 2097152) {
                $file_name_new = $file_name;
                $file_dest = "./upload/".$file_name_new;

                if(move_uploaded_file($file_tmp, $file_dest)) {
                    echo $file_dest;
                };


            }
        }
    }
        echo "<tr>";
        echo "<th class='file_name' scope='row'>$file_name</th>";
        echo  "<td class='cd_date'>Mark</td>";
        echo "<td class='md_date'>Otto</td>";
        echo "<td class='extension'>$file_ext</td>";
        echo "<td class='size'>$file_size</td>";
        echo "</tr>";

}
