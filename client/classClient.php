<?php

include_once("..//lib/function.php");
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
        $pattern = '/^[A-Za-z]+$/';
        $isValid = false;

        while (!$isValid) {

            $nom = readline("Saisissez votre nom: ");

            if (preg_match($pattern, $nom)) {

                $isValid = true;
            } else {
                echo "Nom invalide. Veuillez n'entrez que des lettres." . PHP_EOL;
            }
        }
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


        $pattern = '/^[A-Za-z]+$/';
        $isValid = false;

        while (!$isValid) {

            $prenom = readline("Saisissez votre Prenom: ");
            if (preg_match($pattern, $prenom)) {

                $isValid = true;
            } else {
                echo "Prenom invalide. Veuillez n'entrez que des lettres." . PHP_EOL;
            }
        }
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


        $dateNaissance = saisirDateNaissance();
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
        $pattern = '/^[\w.-]+@[\w.-]+.\w+$/';
        $isValid = false;
        while (!$isValid) {
            $mail = readline("veuillez entrez votre mail: ");
            if (preg_match($pattern, $mail)) {
                $isValid = true;
            } else {
                echo "Adresse e-mail invalide. Veuillez réessayer." . PHP_EOL;
            }
        }
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
    public static function createClient()
    {

        $client = [];
        $client = new Client;
        $fileName = '../client/sauv/client.csv';

        do {
            $client->setIdClient();
            csvToArray($array, $fileName);
            researchInArrayAndFindArray($checkForID, $client->getIdClient(), $array);
        } while ($checkForID !== null); //la condition null à vérifier (quand la fonction de recherche trouve rien)

        $client->setPrenom();
        $client->setNom();
        $client->setDateNaissance();
        $client->setMail();
        $header = array("ID", "Nom", "Prénom", "Date_de_naissance", "Mail");
        // $checkForMail = researchInArray($client->getMail(), $array); //je suis pas sur 
        researchInArrayAndFindArray($checkForMail, $client->getMail(), $array);
        if ($checkForMail !== null) {
            echo ("Ce compte client existe déja. \n" . "Vous allez être redirigé sur le menu.\n");
        } else {
            createFile($client, $fileName, $header);
        }
    }


    //si on demande une valeur qui existe plusieurs fois on aura que le premier objet qui le contient
    public static function researchClientByUniqueValue()
    {
        $value = readline("Veuillez saisir l'ID client': ");
        $fileName = "../client/sauv/client.csv";
        csvToArray($arrayIn, $fileName);
        var_dump($arrayIn);
        $var = researchInArray($value, $arrayIn);
        var_dump($var);
    }

    public static function researchClientByMoreValue()
    {
        $value = readline("Veuillez saisir n'importe quoi concernant le client': ");
        $fileName = "../client/sauv/client.csv";
        csvToArray($arrayIn, $fileName);
        var_dump($arrayIn);
        researchInArrayAndFindArray($contextualArray, $value, $arrayIn);
        var_dump($contextualArray);
    }

    //function obsolète
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


// Client::researchClientByUniqueValue();
