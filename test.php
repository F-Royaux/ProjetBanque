<?php
// include_once("./client/classClient.php");
require_once("./lib/function.php");

$fileName= "./client/sauv/client.csv";

csvToArray($newArray, $fileName);
print_r($newArray);
$recherhceId = "HA084856";
$x = researchInArray($recherhceId, $newArray);
// researchInArray($recherhceId, $newArray);
// function researchTabAssociatif($array, $key, $value){
// foreach ($array as $key => $value) {
//     if ($key => $value)
// }
// }
print_r($x);