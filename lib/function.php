<?php


// fuction pour passer un .csv dans un tableau;; reste à vérifier avec plusieurs objets
function FileToArray($fileName)
{
    $fp = fopen($fileName, "r");
    while (!feof($fp) ) {
        $lines[] = fgetcsv($fp);
    }
    fclose($fp);
   return $lines;
}

$csv=FileToArray($fileName);
print_r($csv);