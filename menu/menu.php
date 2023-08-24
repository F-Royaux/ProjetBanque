<?php
// require_once ("../client/createfileclient.php")
include("../client/classClient.php");


$restart = "Oui";

while ($restart == "Oui" || $restart == "oui") {

    echo "-----------------------------------------------\n";
    echo "1 - Créer une agence\n";
    echo "2 - Créer un client\n";
    echo "3 - Créer un compte bancaire\n";
    echo "4 - Recherche de compte (Numéro de client)\n";
    echo "5 - Recherche de client (Nom, Numéro de compte, Identifiant client)\n";
    echo "6 - Afficher la liste des comptes d’un client (Identifiant client)\n";
    echo "7 - Imprimer les infos client (Identifiant client)\n";
    echo "8 - Quitter le programme\n";
    echo "-----------------------------------------------\n\n";

    $choix = readline("Faites votre choix : ");
    switch ($choix) {
        case 1:
            include("../banque/createfileagence.php");
            break;
        case 2:
            // CHEMIN TEMPORAIRE ATTENTION
            include("../client/createfileclient.php");
            break;
        case 3:
        case 4:
            Client::researchClientByUniqueValue();
            break;
        case 5:
            Client::researchClientByMoreValue();
            break;
        case 6:
        case 7:
        case 8:
            exit;
        default;
            echo "Un choix compris entre 1 et 8 svp.\n";
            break;
    }
    $restart = readline("Voulez-vous effectuer une autre opération ? (Oui/Non)\n");
}
