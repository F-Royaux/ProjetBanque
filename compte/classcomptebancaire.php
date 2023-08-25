<?php
//créer une classe compte banquaire avec les variables N°compte (=ID), Objet Client, Code Agence, Solde, découvertO/N. ((éventuellement type)) pas besoin de constructeur, faire getter/setter(avec des readlines) sauf pour client objet et code agence.
class comptebancaire{

    private int Typedecompte=$typedecompte;
    private float Solde=$Solde;
    private bool DecouvertAutorise=$DecouvertAutorise;
    private string IDAgence= $Idagence;
    private string IDclient= $IdClient;
    private string IDcomptebancaire=$Idcomptebancaire;
    
    /**
     * Get the value of typedecompte
     *
     * @return int
     */
    public function getTypedecompte(): int {
        return $this->typedecompte;
    }

    /**
     * Set the value of typedecompte
     *
     * @param int $typedecompte
     *
     * @return self
     */
    public function setTypedecompte(int $typedecompte): self {
        $this->typedecompte = $typedecompte;
        return $this;
    }

    
    /**
     * Get the value of DecouvertAutorise
     *
     * @return bool
     */
    public function getDecouvertAutorise(): bool {
        return $this->DecouvertAutorise;
    }

    /**
     * Set the value of DecouvertAutorise
     *
     * @param bool $DecouvertAutorise
     * @return self
     */
    public function setDecouvertAutorise(bool $DecouvertAutorise): self {
     
        if ($Solde => 0) {
            $DecouvertAutorise=true;
        } 
        else {
            $DecouvertAutorise=false;
        }
        $this->DecouvertAutorise = $DecouvertAutorise;
        return $this;
    }

    

    /**
     * Get the value of Solde
     *
     * @return float
     */
    public function getSolde(): float {
        return $this->Solde;
    }

    /**
     * Set the value of Solde
     *
     * @param int $Solde
     *
     * @return self
     */
    public function setSolde(int $Solde): self {
        $this->Solde = $Solde;
        return $this;
    }

    /**
     * Get the value of Idagence
     *
     * @return string
     */
    public function getIdagence(): string {
        return $this->Idagence;
    }

    /**
     * Set the value of Idagence
     *
     * @param string $Idagence
     *
     * @return self
     */
    public function setIdagence(string $Idagence): self {
        $this->Idagence = $Idagence;
        return $this;
    }

    /**
     * Get the value of IdClient
     *
     * @return string
     */
    public function getIdClient(): string {
        return $this->IdClient;
    }

    /**
     * Set the value of IdClient
     *
     * @param string $IdClient
     *
     * @return self
     */
    public function setIdClient(string $IdClient): self {
        $this->IdClient = $IdClient;
        return $this;
    }

    /**
     * Get the value of Idcomptebancaire
     *
     * @return string
     */
    public function getIdcomptebancaire(): string {
        return $this->Idcomptebancaire;
    }

    /**
     * Set the value of Idcomptebancaire
     *
     * @param string $Idcomptebancaire
     *
     * @return self
     */
    public function setIdcomptebancaire(string $Idcomptebancaire): self {
        $this->Idcomptebancaire = $Idcomptebancaire;
        return $this;
    }
}
