<?php
        $arrayFile = glob('../../storage/*', GLOB_BRACE);

        foreach ($arrayFile as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) !== "") {

                $fileName =  basename($file);
                $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                $fileCreate =  date("Y-m-d H:m:s", fileatime($file));
                $fileModify =  date("Y-m-d H:m:s", filemtime($file));

                $fileSizeB = filesize($file);
                if ($fileSizeB >= 0) {
                    $fileSize = $fileSizeB / 1024;
                    $format = "Kb";
                    if ($fileSize >= 1024) {
                        $fileSize = $fileSize / 1024;
                        $format = "Mb";
                        if ($fileSize >= 1024) {
                            $fileSize = $fileSize / 1024;
                            $format = "Gb";
                        }
                    }
                }
                echo ' <tr>' .
                    ' <td> ' . $fileName . ' </td> ' .
                    ' <td> ' . $fileType . ' </td>' .
                    ' <td> ' . $fileCreate . ' </td>' .
                    ' <td> ' . $fileModify . ' </td>' .
                    ' <td> ' . round($fileSize, 2) . $format . ' </td>' .
                    ' <td> ' . 'ACTIONS' . ' </td>' .
                    '</tr> ';
                # code...
            }
        }
