<?php
include("lib/function.php");

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
    public function createIdAgence()
    {
        // $filename = "banque/sauv/agence.csv";
        $filename = "banque/sauv/agence.csv";
        csvToArray($idCrea, $filename);
        if (!file_exists($filename)) {
            $rand = 0;
        } else { // ici on cherche le dernier ID dans le fichier
            $x = end($idCrea); // on prend le dernier élément
            $rand = $x["Id"]; // on assigne son index à une valeur x
        }
        $strlengthagence = 3; // on génére l'id
        $rand = $rand + 1;
        $rand = substr("000{$rand}", -$strlengthagence);
        var_dump($rand);
        $idAgence= $rand;
        return $idAgence;  
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
<<<<<<< HEAD
    }
=======
    }

    public static function researchIdAgence()
    {
        //ouvrir fichier agenceId.csv
        //vérifier si fichier existe
        //si oui : rand = 0; sinon rand = dernière valeur
    }
}


// Agence::createIdAgence(); //test de la méthode
>>>>>>> b5f0104356cfc671cf40aae25d40dca8fa4f6edc
