<?php

class Agence
{
    private int $IdAgence;
    private string $NomAgence;
    private string $Adresse;

    /**
     * Get the value of NomAgence
     *
     * @return string
     */
    public function getNomAgence(): string
    {
        return $this->NomAgence;
    }

    /**
     * Set the value of NomAgence
     *
     * @param string $NomAgence
     *
     * @return self
     */
    public function setNomAgence(): self
    {
        $this->NomAgence = readline("Saisir le nom d'agence : ");

        return $this;
    }

    /**
     * Get the value of Adresse
     *
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->Adresse;
    }

    /**
     * Set the value of Adresse
     *
     * @param string $Adresse
     *
     * @return self
     */
    public function setAdresse(): self
    {
        $this->Adresse = readline("Saisir l'adresse : ");

        return $this;
    }

    /**
     * Get the value of CodeAgence
     *
     * @return int
     */
    public static function createIdAgence()
    {
        echo("dur");
        // $filename = "../banque/sauv/agence.csv";
        $filename = "./sauv/agence.csv";
        if (!file_exists($filename)) {
            $rand = 0;
        } else { // ici on cherche le dernier ID dans le fichier
            csvToArray($idCrea, $filename);
            $x = end($idCrea);
            $rand = $x[0];
        }
       
        $strlengthagence = 3;
        $rand = $rand + 1;
        $rand = substr("000{$rand}", -$strlengthagence);
        var_dump($rand);
        $idAgence= $rand;
        var_dump($idAgence);
        
    }

    public function getIdAgence(): ?int
    {
        return $this->IdAgence;
    }

    /**
     * Set the value of CodeAgence
     *
     * @param ?int $CodeAgence
     *
     * @return self
     */
    public function setIdAgence(?int $IdAgence): self
    {
        $this->IdAgence = $this->createIdAgence();

        return $this;
    }

    public static function researchIdAgence()
    {
        //ouvrir fichier agenceId.csv
        //vérifier si fichier existe
        //si oui : rand = 0; sinon rand = dernière valeur
    }
}


// Agence::createIdAgence(); //test de la méthode
