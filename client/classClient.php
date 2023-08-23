<?php
class Client
{

    private string $IdClient;
    private string $nom;
    private string $prenom;
    private string $dateNaissance;
    private string $mail;


    /**
     * Get the value of IdClient
     */
    public function getIdClient(): string
    {
        return $this->IdClient;
    }

    // /** Ici en attente de la méthode
    //  * Set the value of IdClient
    //  *
    //  * @return  self
    //  */ 
    public function setIdClient(): self
    {
        $this->IdClient = $this->createIdClient();

        return $this;
    }

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
        $nom = readline("Votre nom: ");
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


        $dateNaissance = readline("votre date de naissance, (format 31/12/2000) : ");
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

    public function createIdClient()
    {
        $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $randLet = "";

        for ($i = 0; $i < 2; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randLet .= $characters[$index];
        }
        $idCliLet = $randLet;
        $strLengthNb = 6;
        $randNb = random_int(0, 999999);
        $randNb = substr("000000{$randNb}", -$strLengthNb);

        $idCliNb = strval($randNb);

        $IdClient = $idCliLet . $idCliNb;

        return $IdClient;
    }
    //function obsolète
    // public function researchClientByID()
    // {
    //     // $Idclient = $this->IdClient;
    //     $value = intval(readline("Veuillez saisir l'ID client': "));
    //     $fileName = "./sauv/client.csv";
    //     $array = FileToArray($fileName);
    //     $objet = researchInArray($value, $array);
    //     return $objet;
    // }
    // public function researchClientByName()
    // {
    //     // $name = $this->getNom();
    //     $value = intval(readline("Veuillez saisir l'ID client': "));
    //     $fileName = "./sauv/client.csv";
    //     $array = FileToArray($fileName);
    //     $objet = researchInArray($value, $array);
    //     return $objet;
    // }
}

// $Client = new Client;

// $Client->setIdClient();
// print_r($Client);
