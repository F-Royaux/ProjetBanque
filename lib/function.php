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

// fuction pour passer un .csv dans un tableau;; reste à vérifier avec plusieurs objets
//utiliser l'autre fonction à partir de maintenant
// function FileToArray($fileName)
// {
//     $fp = fopen($fileName, "r");
//     while (!feof($fp) ) {
//         $lines[] = fgetcsv($fp);
//     }
//     fclose($fp);
//    return $lines;
// }

// $csv=FileToArray($fileName);

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
};


//à tester
// celle ci sert a sortir tous les tableaux associatif(objet) qui contiennent la valeurRecherche
function researchInArrayAndFindArray(&$contextualArray , $valeurRecherche, $grosTabQuiVientDuCsv)
{
    //$valeurRecherche les valeurs qu'on recherche par exemple ($valeurRecherche = "Gertrude")
    //$grosTabQuiVientDuCsv c'est le tableau qu'on a appelé avant avec une fonction de lecture
    foreach ($grosTabQuiVientDuCsv as $array) {
        foreach ($array as $value) {
            if ($valeurRecherche == $value) {
                $contextualArray[]=  $array;
            } 
        }
    }
    return $contextualArray;
};
