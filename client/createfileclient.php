<?php
// include("./classClient.php");
include_once("../client\classClient.php");
require_once("../lib/function.php");
$client = [];
$client = new Client;
$client->setPrenom();
$client->setNom();
$client->setDateNaissance();
$client->setMail();
$client->setIdClient();
var_dump($client);
$fileName = "../client/sauv/client.csv";
// $fileName = "client\sauv\client.csv";
$header = array("ID", "Nom", "Prénom", "Date_de_naissance", "Mail");

createFile($client, $fileName, $header);
