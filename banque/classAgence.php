<?php
include_once("../lib/function.php");

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
                $pattern = '/^[A-Za-z]+$/';
                $isValid = false;
                while (!$isValid) {
    
                    $NomAgence= readline("Saisir le Nom de l'agence : ");
                        if (preg_match($pattern, $NomAgence)) {
                        $isValid = true;
                    } else{
                        echo "Le nom d'agence n'existe pas:  " . PHP_EOL;
                    }
                        
                }
    
            $this->NomAgence =$NomAgence;
    
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
        $idAgence = $rand;
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
    }
}