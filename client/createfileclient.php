<?php
// include("./classClient.php");
include("client\classClient.php");
require_once("..lib/function.php");

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

createFile($client, $fileName, $header);


