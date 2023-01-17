<?php

$directoriesFolders = [];

$findings = [];

$searchParam = $_REQUEST["searchParam"];

function search2($e, $searchParam)
    {
        global $directoriesFolders;
        global $findings;

        foreach (glob($e) as $name_fichero) {
            $fichero = $name_fichero;
            if (!strpos($fichero, '.')) {
                array_push($directoriesFolders, $fichero);
                search2($fichero . "/*", $searchParam);

            } else {
                array_push($directoriesFolders, $fichero);
            }
        }
        foreach ($directoriesFolders as $directory) {
            if (!in_array($directory, $findings)) {

                if (strpos($directory, $searchParam)) {
                    array_push($findings, $directory);
                }
            }
        }

        return array($directoriesFolders, $findings);

    }

search2("root/*", $searchParam);

// print_r($directoriesFolders);

// echo "<br><br>";

echo json_encode($findings);