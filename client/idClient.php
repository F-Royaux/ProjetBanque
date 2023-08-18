<?php

$n=2;
function getName($n) {
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randLet = "";
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randLet .= $characters[$index];
    }
 
    return $randLet;
}

$idCliLet = getName($n);
$strLengthNb = 6;
$randNb = random_int(0, 999999);
$randNb = substr("000000{$randNb}", -$strLengthNb);

$idCliNb = strval($randNb);

$idClient = $idCliLet . $idCliNb;

echo $idClient;