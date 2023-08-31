<?php

include("../lib/function.php");
//créer une classe compte banquaire avec les variables N°compte (=ID), Objet Client, Code Agence, Solde, découvertO/N. ((éventuellement type)) pas besoin de constructeur, faire getter/setter(avec des readlines) sauf pour client objet et code agence.
class comptebancaire
{

    private string $Idcomptebancaire;
    private string $typedecompte;  //au final j'ai remis un string sur le type de compte pour une lecture plus faile
    private bool $DecouvertAutorise;
    private float $Solde;
    private string  $IdAgence;
    private string  $IdClient;
    
    public function __construct ($Solde ,$DecouvertAutorise){
       
        $this->Solde=$Solde;
        $this->DecouvertAutorise=$DecouvertAutorise;
    }

    /**
     * Get the value of Idcomptebancaire
     *
     * @return string
     */
    public function getIdcomptebancaire(): string
    {
        return $this->Idcomptebancaire;
    }

    /**
     * Set the value of Idcomptebancaire
     *
     * @param string $Idcomptebancaire
     *
     * @return self
     */


    //à tester
    public function setIdcomptebancaire(): self
    {
        do {
            $fileName = "./sauv/agence.csv";

            $rand = 0;
            $strlengthcomptebanc = 11;
            $rand = random_int(0, 99999999999);
            $rand = substr("00000000000{$rand}", -$strlengthcomptebanc);
            $Idcomptebancaire = $rand;
            if (file_exists($fileName)) {
                csvToArray($tabDeRecherche, $fileName);
                $x = researchInArray($Idcomptebancaire, $tabDeRecherche);
            }
        } while (!empty($x));
        //je suis pas sur du empty ici, si la fonction research ne trouve rien dans le tableau-> elle ne retourne rien

        $this->Idcomptebancaire = $Idcomptebancaire;
        return $this;
    }
    /**
     * Get the value of typedecompte
     *
     * @return int
     */
    public function getTypedecompte(): int
    {
        return $this->typedecompte;
    }

    /**
     * Set the value of typedecompte
     *
     * @param int $typedecompte
     *
     * @return self
     */
    public function setTypedecompte(): self
    {
        $input = intval(readline("Quel type de compte voulez vous ouvrir?" . PHP_EOL . " 1-Compte courant 2-Livret A 3-Plan Epargne Logement : "));
        while ($input !== 1 | $input !== 2 | $input !== 3) {
            $input = intval(readline("Il y a eu une erreur dans votre saisie, veuillez recommencer." . PHP_EOL . "Quel type de compte voulez vous ouvrir?" . PHP_EOL . " 1-Compte courant 2-Livret A 3-Plan Epargne Logement : "));
        }
        switch ($input) {
            case 1:
                $typedecompte = "Compte courant";
                break;
            case 2:
                $typedecompte = "Livret A";
                break;
            case 3:
                $typedecompte = "Plan Epargne Logement";
                break;
        }

        $this->typedecompte = $typedecompte;
        return $this;
    }

    /**
     * Get the value of DecouvertAutorise
     *
     * @return bool
     */
    public function getDecouvertAutorise(): bool
    {
        return $this->DecouvertAutorise;
    }

    /**
     * Set the value of DecouvertAutorise
     *
     * @param bool $DecouvertAutorise
     * @return self
     */
    public function setDecouvertAutorise(): self
    {
        $this->getTypedecompte();
        if ($this->typedecompte === "Compte courant") {
            $DecouvertAutorise = true;
        } else {
            $DecouvertAutorise = false;
        };
        $this->DecouvertAutorise = $DecouvertAutorise;
        return $this;
    }



    /**
     * Get the value of Solde
     *
     * @return float
     */
    public function getSolde(): float
    {
        return $this->Solde;
    }

    /**
     * Set the value of Solde
     *
     * @param float $Solde
     *
     * @return self
     */

    public function setSolde(float $Solde=0): self
    {
        $this->DecouvertAutorise=$this->getDecouvertAutorise();
        var_dump($this->DecouvertAutorise);



        
        $this->Solde=$Solde;
        echo ("Solde:" . $Solde);
        var_dump($this->Solde);
        //dans la fonction il manquait l'initialisation de $this->$Solde
        //donc je dois remets ça vite fait en espérant que ca marche :s
        // by Flo
        // if (!isset($this->$Solde)) {
        //     $this->$Solde = 0;
        // } else {
        //     $this->getSolde();
        // }
        // Booleen de la condition de la boucle while
        $isValidInput = false;
        while (!$isValidInput) {
            $input = readline("Veuillez saisir un nombre : ");
            $message = "Saisie invalide. Veuillez entrer un nombre valide.\n";
            //On vérifie que l'utilisateur saisie un nombre valide (hors caractéres)
            if (filter_var($input, FILTER_VALIDATE_FLOAT) !== false) {
                //Permet de convertir la saisie en nombre 
                $soldeInsere = intval($input);
                //Vérification si le solde passe en négatif et que le découvert n'est pas autorisé
                if ($this->Solde + $soldeInsere < 0 and $this->DecouvertAutorise == false) {
                    $message = "Le solde ne peut pas être négatif.\n";
                } else {
                    //Le solde est positif ou négatif mais avec le DecouvertAutorise
                    $this->Solde = $this->Solde + $soldeInsere;
                    $message = "Le solde de votre compte est de : " . $this->Solde . " € ";
                    $isValidInput = true;
                }
            }
            //Affiche le message finale qu'il soit négatif ou positif
            echo $message;
        }
        return $this;
    }

public function setNewSolde(){
    $AncienSolde = $this->getSolde();
    $this->setSolde($AncienSolde);
    return $this;
}



    /**
     * Get the value of IdAgence$IdAgence
     *
     * @return string
     */
    public function getIdAgence(): string
    {
        return $this->IdAgence;
    }

    /**
     * Set the value of IdAgence
     *
     * @param string $IdAgence
     *
     * @return self
     */

    //setIdagence à tester
    public function setIdagence(): self
    {
        //ici on recherche l'id en passant par le nom
        //on pourra le retravailler en proposant par exemple le choix d'écrire l'Id directement ou de faire une recherche
        //protection et redirection à faire
        $input = readline("Veuillez saisir le nom de l'agence avec laquelle le compte sera affilié: ");
        $fileName = "../banque/sauv/agence.csv";
        csvToArray($tabDeRecherche, $fileName);
        $x = researchInArray($input, $tabDeRecherche);
        $IdAgence = $x[0]; // je prends l'index 0 car c'est là qu'est censé se trouver l'ID
        $this->IdAgence = $IdAgence;
        return $this;
    }

    /**
     * Get the value of IdClient
     *
     * @return string
     */
    public function getIdClient(): string
    {
        return $this->IdClient;
    }

    /**
     * Set the value of IdClient
     *
     * @param string $IdClient
     *
     * @return self
     */
    public function setIdClient(): self
    {
        //ici on recherche l'id en passant par le mail
        //on pourra le retravailler en proposant par exemple le choix d'écrire l'Id directement ou de faire une recherche
        //protection et redirection à faire
        $input = readline("Veuillez saisir le mail du client qui possédera le compte: ");
        $fileName = "../client/sauv/client.csv";
        csvToArray($tabDeRecherche, $fileName);
        $x = researchInArray($input, $tabDeRecherche);
        $IdClient = $x[0]; // je prends l'index 0 car c'est là qu'est censé se trouver l'ID

        $this->IdClient = $IdClient;
        return $this;
    }


    public static function createCompte()
    {
        $compte = new comptebancaire;
        $fileName = '../banque/sauv/compte.csv';

        //tous les setters ici

        $compte->setIdcomptebancaire();
        $compte->setIdagence();
        $compte->setIdClient();
        $compte->setTypedecompte();
        $compte->setDecouvertAutorise();
        $compte->setSolde();


        //vérification des doublons et écriture

        csvToArray($tabDeRechercheDoublonCompte, $fileName);
        //je cherche une premiére fois tout les objets avec l'IdClient du compte
        researchInArrayAndFindArray($tabVerifCompte, $compte->IdClient, $tabDeRechercheDoublonCompte);
        //je cherche une seconde fois (dans le tableau qui contient tout les objets avec l'IdClient du compte) 
        //pour vérifier que le même type de compte n'éxiste pas déja
        researchInArrayAndFindArray($tabVerifCompte2, $compte->typedecompte, $tabVerifCompte);
        if (!empty($tabVerifCompte2)) {
            //si la fonction de recherche a trouvé le même type de compte
            echo ("Un client ne peut posséder qu'un seul type de compte" . PHP_EOL . "Vous allez être redirigé vers le menu");
        } else {
            //si la fonction de recherche n'a pas trouvé le même type de compte
            $header = array("IDcomptebancaire", "Idagence", "setIdClient", "Typedecompte", "Solde", "DecouvertAutorise");
            createFile($compte, $fileName, $header);
        }
    }
}

// $objet= New comptebancaire(100, false);
// var_dump($objet);
// // $r = $objet->getSolde();
// // $objet->setSolde($r);
// $objet->setNewSolde();
