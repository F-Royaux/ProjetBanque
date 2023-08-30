<?php
// include_once("./client/classClient.php");
require_once("./lib/function.php");

$fileName= "./client/sauv/client.csv";

csvToArray($newArray, $fileName);
<<<<<<< HEAD
print_r(end($newArray));
// $recherhceId = "HA084856";
// $x = researchInArray($recherhceId, $newArray);
// researchInArray($recherhceId, $newArray);
// function researchTabAssociatif($array, $key, $value){
// foreach ($array as $key => $value) {
//     if ($key => $value)
// }
// }
// print_r($x);
=======
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
>>>>>>> 299773e1b71570787b409553e275fea2c191c3f8
