<?php
class Client
{
    private string $Idclient;
    private string $nom;
    private string $prenom;
    private int $dateNaissance;
    private string $mail;


    /**
     * Get the value of Idclient
     */
    public function getIdclient()
    {
        return $this->Idclient;
    }

    // /** Ici en attente de la méthode
    //  * Set the value of Idclient
    //  *
    //  * @return  self
    //  */ 
    // public function setIdclient($Idclient)
    // {
    //     $this->Idclient = $Idclient;

    //     return $this;
    // }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom()
    {
        $nom = readline("Votre nom:");
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom()
    {
        $prenom = readline("Votre prénom: ");
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of dateNaissance
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @return  self
     */
    public function setDateNaissance()
    {
        $dateNaissance = intval(readline("votre date de naissance: "));
        $this->dateNaissance = $dateNaissance;


        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail()
    {
        $mail = readline("Votre mail: ");
        $this->mail = $mail;

        return $this;
    }
}
