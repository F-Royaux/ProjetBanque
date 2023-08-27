<?php 
//une fonction d'Arnaud, je la met la pour pas la perdre

public function setDecouvertAutorise(bool $DecouvertAutorise): self
    {

        if ($Solde >= 0) {
            $DecouvertAutorise = true;
        } else {
            $DecouvertAutorise = false;
        }
        $this->DecouvertAutorise = $DecouvertAutorise;
        return $this;
    }