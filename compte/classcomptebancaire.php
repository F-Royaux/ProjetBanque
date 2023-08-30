<?php

include ("../lib/function.php");
//créer une classe compte banquaire avec les variables N°compte (=ID), Objet Client, Code Agence, Solde, découvertO/N. ((éventuellement type)) pas besoin de constructeur, faire getter/setter(avec des readlines) sauf pour client objet et code agence.
class comptebancaire
{

    private string $Idcomptebancaire;
    private string $typedecompte;  //au final j'ai remis un string sur le type de compte pour une lecture plus faile
    private float $Solde;
    private bool $DecouvertAutorise;
    private string  $Idagence;
    private string  $IdClient;

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
    public function setIdcomptebancaire(string $Idcomptebancaire): self
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
    public function setTypedecompte(string $typedecompte): self
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
    public function setDecouvertAutorise(bool $DecouvertAutorise): self
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
     * @param int $Solde
     *
     * @return self
     */
     
    public function setSolde(float $Solde, bool $DecouvertAutorise): self
    { 
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
                if ($this->$Solde + $soldeInsere < 0 and $this->$DecouvertAutorise == false) {
                    $message = "Le solde ne peut pas être négatif.\n";
                } else {
                    //Le solde est positif ou négatif mais avec le DecouvertAutorise
                    $this->$Solde = $this->$Solde + $soldeInsere;
                    $message = "Le solde de votre compte est de : " . $this->$Solde . " € ";
                    $isValidInput = true;
                }
            }
            //Affiche le message finale qu'il soit négatif ou positif
            echo $message;
        }
        return $this;
    }
        
       
    

    /**
     * Get the value of Idagence
     *
     * @return string
     */
    public function getIdagence(): string
    {
        return $this->Idagence;
    }

    /**
     * Set the value of Idagence
     *
     * @param string $Idagence
     *
     * @return self
     */

    //setIdagence à tester
    public function setIdagence(int $Idagence): self
    {
        //ici on recherche l'id en passant par le nom
        //on pourra le retravailler en proposant par exemple le choix d'écrire l'Id directement ou de faire une recherche
        $input = readline("Veuillez saisir le nom de l'agence avec laquelle le compte sera affilié: ");
        $fileName = "../banque/sauv/agence.csv";
        csvToArray($tabDeRecherche, $fileName);
        $x = researchInArray($input, $tabDeRecherche);
        $Idagence = $x[0]; // je prends l'index 0 car c'est là qu'est censé se trouver l'ID
        $this->Idagence = $Idagence;
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
    public function setIdClient(string $IdClient): self
    {
        //ici on recherche l'id en passant par le mail
        //on pourra le retravailler en proposant par exemple le choix d'écrire l'Id directement ou de faire une recherche
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
        //tous les setters ici
        //éventuellement vérifier les doublons
        //ensuite écrire dans le fichiers
    }
}
