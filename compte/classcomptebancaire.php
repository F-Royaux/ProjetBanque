<?php
//créer une classe compte banquaire avec les variables N°compte (=ID), Objet Client, Code Agence, Solde, découvertO/N. ((éventuellement type)) pas besoin de constructeur, faire getter/setter(avec des readlines) sauf pour client objet et code agence.
class comptebancaire
{

    private string $Idcomptebancaire;
    private string $typedecompte;
    //au final j'ai remis un string sur le type de compte pour une lecture plus faile
    private float $Solde;
    private bool $DecouvertAutorise;
    private string  $IdAgence;
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
            $Idcomptebancaire = randcompteb($rand);

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
    public function setSolde(int $Solde): self
    {

        //il y aura une petite nuance à prendre en compte à la protection de la saisie:
        // si $decouvertAutorisé = false => empêcher la saisie de valeurs négatives
        $Solde = intval(readline("Veuillez saisir le solde du compte : "));
        $this->Solde = $Solde;
        return $this;
    }

    /**
     * Get the value of IdAgence$IdAgence
     *
     * @return string
     */
    public function getIdAgence$IdAgence(): string
    {
        return $this->IdAgence$IdAgence;
    }

    /**
     * Set the value of IdAgence$IdAgence
     *
     * @param string $IdAgence
     *
     * @return self
     */

     //setIdAgence$IdAgence à tester
    public function setIdAgence$IdAgence(int $IdAgence): self
    {
        $input = readline("Veuillez saisir le nom de l'agence avec laquelle le compte sera affilié: ");
        $fileName = "../banque/sauv/agence.csv";
        csvToArray($tabDeRecherche, $fileName);
        $x = researchInArray($input, $tabDeRecherche);
        $IdAgence = $x[0];
        $this->IdAgence$IdAgence = $IdAgence;
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
        $input = readline("Veuillez saisir le nom du client qui possédera le compte: ");
        $fileName = "../client/sauv/client.csv";
        csvToArray($tabDeRecherche, $fileName);
        $x = researchInArray($input, $tabDeRecherche);
        $IdClient = $x[0];
        
        $this->IdClient = $IdClient;
        return $this;
    }


    public static function createCompte()
    {
        //setter ici
    }
}
