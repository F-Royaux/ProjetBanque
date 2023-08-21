<?php
// include("./classClient.php");
include("client\classClient.php");


$client = new Client;
$client->setPrenom();
$client->setNom();
$client->setDateNaissance();
$client->setMail();
$client->setIdClient();
var_dump($client);
$fileName = "./sauv/client.csv";
$fileName = "client\sauv\client.csv";
$header = array("Nom", "Prénom", "Date_de_naissance", "Mail");

function createFile($client, $fileName, $header)
{
    $fp = fopen($fileName, "w");
    fputcsv($fp, $header);
    fputcsv($fp, (array)$client);
    fclose($fp);
}

createFile($client, $fileName, $header);


