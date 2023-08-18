<?php

include("./classAgence.php");

$numero = [];

$agence = new Agence;
$agence->setNomAgence();
$agence->setNumeroRueAdresse();
$agence->setCodePostalAgence();
$agence->setVilleAgence();
$agence->pushAdresse($numero);


$fileName = "./sauv/agence.csv";
$header = array("Nom", "Adresse");

function createFile($client, $fileName, $header)
{
    $fp = fopen($fileName, "w");
    fputcsv($fp, $header);
    fputcsv($fp, (array) $client);
    fclose($fp);
}

createFile($agence, $fileName, $header);
