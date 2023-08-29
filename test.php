<?php
// include_once("./client/classClient.php");
require_once("./lib/function.php");

$fileName= "./client/sauv/client.csv";

csvToArray($newArray, $fileName);
// print_r($newArray);
$recherhceId = "HA084857";
// $arrayTest = researchInArray($recherhceId, $newArray);

// print_r($arrayTest);
// var_dump(isset($arrayTest));
// if (!$arrayTest)
// {echo ("condition 1");}else{
//     print_r($arrayTest);
// }

researchInArrayAndFindArray($contextualArray, $recherhceId, $newArray) ;
var_dump($contextualArray);