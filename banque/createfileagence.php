<?php

include("./classAgence.php");
require_once("../lib/function.php");
$numero = [];

$agence = new Agence;
$agence->setNomAgence();
$agence->setAdresse();
// $agence->setNumeroRueAdresse();
// $agence->setCodePostalAgence();
// $agence->setVilleAgence();
// $agence->pushAdresse($numero);

$fileName = "./sauv/agence.csv";
$header = array("Nom", "Adresse");

createFile($agence, $fileName, $header);
