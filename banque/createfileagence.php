<?php

include("./classAgence.php");

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

function createFile($client, $fileName, $header)
{

    if (!file_exists($fileName)) {
        $fp = fopen($fileName, "a");
        fputcsv($fp, $header);
        fclose($fp);
    }
    $fp = fopen($fileName, "a");

    fputcsv($fp, (array) $client);
    fclose($fp);
}

createFile($agence, $fileName, $header);
