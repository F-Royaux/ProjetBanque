<?php


//fonction de Frank pour ouvrir un fichier
function createFile($objet, $fileName, $header)
{

    if (!file_exists($fileName)) {
        $fp = fopen($fileName, "a");
        fputcsv($fp, $header);
        fclose($fp);
    }
    $fp = fopen($fileName, "a");

    fputcsv($fp, (array) $objet);
    fclose($fp);
}

//la function a christope !!j'ai du enlevé le 3éme argument qui embêtait
function csvToArray(&$donnees, $filename = '') 
{
    if (!file_exists($filename) || !is_readable($filename))
        return FALSE;

    $header = NULL;
    $donnees = array();
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
            if (!$header)
                $header = $row;
            else
                $donnees[] = array_combine($header, $row);
        }
        fclose($handle);
    }
}


//la function research dans une version globale et adaptable
//à tester une fois qu'on a plus d'objet
//si la fonction ne marche pas il faudra faire plusieurs méthode en foncion de ce qu'on recherche (voir ressources)


//comportement attendu: retourne le premier objet qui contient la valeur cherché 
//attention ne l'utiliser que sur des valeurs uniques!
function researchInArray($valeurRecherche, $grosTabQuiVientDuCsv)
{
    //$valeurRecherche la valeur qu'on recherche par exemple ($valeurRecherche = "Gertrude")
    //$grosTabQuiVientDuCsv c'est le tableau qu'on a appelé avant avec une fonction de lecture
    foreach ($grosTabQuiVientDuCsv as $array) {
        foreach ($array as $value) {
            if ($valeurRecherche == $value) {
                return $array;
            }
        }
    }
    return false;
};


//à tester
// celle ci sert a sortir tous les tableaux associatif(objet) qui contiennent la valeurRecherche
function researchInArrayAndFindArray(&$contextualArray, $valeurRecherche, $grosTabQuiVientDuCsv)
{
    //$valeurRecherche les valeurs qu'on recherche par exemple ($valeurRecherche = "Gertrude")
    //$grosTabQuiVientDuCsv c'est le tableau qu'on a appelé avant avec une fonction de lecture
    foreach ($grosTabQuiVientDuCsv as $array) {
        foreach ($array as $value) {
            if ($valeurRecherche == $value) {
                $contextualArray[] =  $array;
            }
        }
    }
    return $contextualArray;
};
function saisirDateNaissance()
{
    $dateValide = false;

    while (!$dateValide) {
        $input = readline("Entrez votre date de naissance (JJ/MM/AAAA) : ");

        // Vérifier si la saisie correspond au format attendu
        if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $input, $matches)) {
            $jour = intval($matches[1]);
            $mois = intval($matches[2]);
            $annee = intval($matches[3]);

            // Vérifier si la date est valide
            if (checkdate($mois, $jour, $annee)) {
                // Calculer l'âge
                $aujourdHui = new DateTime();
                $dateNaissance = new DateTime("$annee-$mois-$jour");
                $difference = $aujourdHui->diff($dateNaissance);
                $age = $difference->y;

                // Vérifier si l'âge est supérieur à 18
                if ($age >= 18) {
                    $dateValide = true;
                    $dateNaissanceFormattée = sprintf('%02d/%02d/%04d', $jour, $mois, $annee);
                    return $dateNaissanceFormattée;
                } else {
                    echo "Vous devez avoir au moins 18 ans pour continuer.\n";
                    exit;
                }
            } else {
                echo "Date de naissance invalide. Veuillez réessayer.\n";
            }
        } else {
            echo "Format invalide. Veuillez utiliser le format JJ/MM/AAAA.\n";
        }
    }
}
