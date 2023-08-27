<?php

class Agence
{
    private ?int $IdAgence;
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
     * @return ?int
     */
    public function createIdAgence()
    {
        $rand = 000;
        $strlengthagence = 3;
        $rand = $rand + 1;
        $rand = substr("000{$rand}", -$strlengthagence);
        $idAgence = randagence($rand);
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
        $this->IdAgence = $IdAgence;

        return $this;
    }

    public static function researchIdAgence()
    {
        $value = readline("Veuillez saisir l'ID de l'agence': ");
        $fileName = "../banque/sauv/agenceId.csv";
        csvToArray($arrayIn, $fileName);
        var_dump($arrayIn);
        $var = researchInArray($value, $arrayIn);
        var_dump($var);
    }
}
