<?php
include_once("./client/classClient.php");
require_once("./lib/function.php");

$fileName= "./client/sauv/client.csv";



function csvToArray(&$donnees, $filename = '')
{
	if (!file_exists($filename) || !is_readable($filename))
		return FALSE;

	$header = NULL;
	$donnees = array();
	if (($handle = fopen($filename, 'r')) !== FALSE) {
		while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
			if (!$header)
				$header = $row;
			else
				$donnees[] = array_combine($header, $row);
		}
		fclose($handle);
	}
}

csvToArray($newArray, $fileName);
print_r($newArray);
$recherhceId = "LH479119";
$x = researchInArray("Wattiez", $newArray);
// researchInArray($recherhceId, $newArray);
// function researchTabAssociatif($array, $key, $value){
// foreach ($array as $key => $value) {
//     if ($key => $value)
// }
// }
print_r($x);