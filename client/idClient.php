<?php

function createIdClient()
{
    function createMaj()
    {
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randLet = "";

        for ($i = 0; $i < 2; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randLet .= $characters[$index];
        }

        return $randLet;
    }

    $idCliLet = createMaj();
    $strLengthNb = 6;
    $randNb = random_int(0, 999999);
    $randNb = substr("000000{$randNb}", -$strLengthNb);

    $idCliNb = strval($randNb);

    $idClient = $idCliLet . $idCliNb;

    return $idClient;
    
}