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
function FileToArray($fileName)
{
    $fp = fopen($fileName, "r");
    while (!feof($fp) ) {
        $lines[] = fgetcsv($fp);
    }
    fclose($fp);
   return $lines;
}

// $csv=FileToArray($fileName);




//la function research dans une version globale et adaptable
//à tester une fois qu'on a plus d'objet
//si la fonction ne marche pas il faudra faire plusieurs méthode en foncion de ce qu'on recherche (voir ressources)


//comportement attendu: retourne l'objet si la propriété voulue est trouvée sinon retourne "false"
function researchInArray($valeurRecherche, $grosTabQuiVientDuCsv) {
    //$valeurRecherche la valeur qu'on recherche par exemple ($valeurRecherche = "Gertrude")
    //$grosTabQuiVientDuCsv c'est le tableau qu'on a appelé avant avec une fonction de lecture
    foreach ($grosTabQuiVientDuCsv as $array) {
        foreach ($array as $value) {
            if ($valeurRecherche == $value){
                return $array ;
            }
        }
    }
    return false;
};
//attention ca ne fonctionnera qu'avec des valeurs uniques!







