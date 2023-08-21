<?php

class Agence
{
    // private ?int $CodeAgence;
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
    // // public function getCodeAgence(): ?int
    // // {
    // //     return $this->CodeAgence;
    // // }

    // // /**
    // //  * Set the value of CodeAgence
    // //  *
    // //  * @param ?int $CodeAgence
    // //  *
    // //  * @return self
    // //  */
    // // public function setCodeAgence(?int $CodeAgence): self
    // // {
    // //     $this->CodeAgence = $CodeAgence;

    // //     return $this;
    // // }


}
