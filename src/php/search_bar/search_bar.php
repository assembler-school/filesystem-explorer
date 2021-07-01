<?php

session_start();

$mySearchedInput = $_POST["inputSearch"];

$sesion_name = $_SESSION["username"];

$relative_dir = "C:/xampp/htdocs/filesystem-explorer/root/$sesion_name";

function directoryIterator($dir, $mySearchedInput)
{
		if($mySearchedInput === ""){
			echo "Búscate algo wey &#128512";
		} else {
			foreach (new DirectoryIterator($dir) as $fileInfo) {
				if ($fileInfo->isDot()) {
					continue;
				}
				// echo $fileInfo->getFilename() . "<br>\n";
				// echo $fileInfo->getPath() . "<br>\n";
				if (is_dir($dir . "/" . $fileInfo)) {
					$newPath = $dir . "/" . $fileInfo;
					directoryIterator($newPath, $mySearchedInput);
					if (stristr($fileInfo, $mySearchedInput , 0)){
						echo "<p class='input__search--folders'>" . $fileInfo . " Is dir</p>\n";
					};
				} elseif (is_file($dir . "/" . $fileInfo)) {
					if (stristr($fileInfo, $mySearchedInput, 0)) {
						echo "<p class='input__search--files'>" . $fileInfo . " Is File</p>\n";
					}
				}
				// echo $fileInfo->getPath() . "<br>\n";
				// echo $fileInfo->getBasename() . "<br>\n";
			}
		}

}

// echo "<h5>Folders</h5> <hr>";
// echo searchFolder($relative_dir, $mySearchedInput);
// echo "<h5>Files</h5> <hr>";

echo "<div class='text__inside--input'>";
echo directoryIterator($relative_dir, $mySearchedInput);
echo "</div>";

// $search = "hola me llamo erick";
// if (strstr($search, $mySearchedInput)) {
// 	echo $search;
// 	echo $mySearchedInput;
// }


// echo contains_substr("erickeselmejor","lol");
// echo $mySearchedInput;
// echo $actual_link;
// echo $sesion_name;
