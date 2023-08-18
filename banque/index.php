<?php

class Agence
{
    // private ?int $CodeAgence;
    private string $NomAgence;
    private array $Adresse;
    private string $NumeroRueAdresse;
    private int $CodePostalAgence;
    private string $VilleAgence;

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
    public function getAdresse(): array
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
    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * Get the value of CodeAgence
     *
     * @return ?int
     */
    // public function getCodeAgence(): ?int
    // {
    //     return $this->CodeAgence;
    // }

    // /**
    //  * Set the value of CodeAgence
    //  *
    //  * @param ?int $CodeAgence
    //  *
    //  * @return self
    //  */
    // public function setCodeAgence(?int $CodeAgence): self
    // {
    //     $this->CodeAgence = $CodeAgence;

    //     return $this;
    // }

    /**
     * Get the value of NumeroRueAdresse
     *
     * @return string
     */
    public function getNumeroRueAdresse(): string
    {
        return $this->NumeroRueAdresse;
    }

    /**
     * Set the value of NumeroRueAdresse
     *
     * @param string $NumeroRueAdresse
     *
     * @return self
     */
    public function setNumeroRueAdresse(): self
    {
        $this->NumeroRueAdresse = readline("Saisir le numéro et la rue de l'agence : ");

        return $this;
    }

    /**
     * Get the value of CodePostalAgence
     *
     * @return int
     */
    public function getCodePostalAgence(): int
    {
        return $this->CodePostalAgence;
    }

    /**
     * Set the value of CodePostalAgence
     *
     * @param int $CodePostalAgence
     *
     * @return self
     */
    public function setCodePostalAgence(): self
    {
        $this->CodePostalAgence = readline("Saisir le code postal de l'agence : ");

        return $this;
    }

    /**
     * Get the value of VilleAgence
     *
     * @return string
     */
    public function getVilleAgence(): string
    {
        return $this->VilleAgence;
    }

    /**
     * Set the value of VilleAgence
     *
     * @param string $VilleAgence
     *
     * @return self
     */
    public function setVilleAgence(): self
    {
        $this->VilleAgence = readline("Saisir la ville de l'agence : ");

        return $this;
    }
}
$agence = new Agence;
$agence->setNomAgence();
$agence->setNumeroRueAdresse();
$agence->setCodePostalAgence();
$agence->setVilleAgence();


var_dump($agence);
