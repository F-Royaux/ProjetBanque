<?php


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
function Research($array, $value, $property){
    //$array est le tableau d'objet que l'on récup avant avec $array=FileToArray()
    //$value est la valeur exacte qu'on recherche (exemple: 001 , "Franck", ... )
    //$property c'est la propriété de l'objet qu'on recherce ( $property = $this->propety avant l'apelle de Research? )
       foreach ( $array as $element ) {
        if ( $value == $property ) {
            return $element;
        }
    }

    return false;
}

