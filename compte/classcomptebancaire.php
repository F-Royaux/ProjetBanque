<?php
//créer une classe compte banquaire avec les variables N°compte (=ID), Objet Client, Code Agence, Solde, découvertO/N. ((éventuellement type)) pas besoin de constructeur, faire getter/setter(avec des readlines) sauf pour client objet et code agence.
class comptebancaire{
    private int Typedecompte=$typedecompte
    private int Solde=$Solde
    private bool Adecouvert=$Adecouvert
    private string IDAgence= $Idagence
    private string IDclient= $IdClient
    private string IDcomptebancaire=$Idcomptebancaire

  
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
     * Get the value of Adecouvert
     *
     * @return bool
     */
    public function getAdecouvert(): bool {
        return $this->Adecouvert;
    }

    /**
     * Set the value of Adecouvert
     *
     * @param bool $Adecouvert
     *
     * @return self
     */
    public function setAdecouvert(bool $Adecouvert): self {
     
        if ($Solde => 0 ) {
            $Adecouvert=true;
        } 
        else {
            $Adecouvert=false;
        }
        $this->Adecouvert = $Adecouvert;
        return $this;
    }

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
     * Get the value of Solde
     *
     * @return int
     */
    public function getSolde(): int {
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
}