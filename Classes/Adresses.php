<?php

class Adresses
{
    private $id;
    private $Adresse;
    private $CodePostal;
    private $idCommerce;
    private $Ville;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * @param mixed $Adresse
     */
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->CodePostal;
    }

    /**
     * @param mixed $CodePostal
     */
    public function setCodePostal($CodePostal)
    {
        $this->CodePostal = $CodePostal;
    }

    /**
     * @return mixed
     */
    public function getIdCommerce()
    {
        return $this->idCommerce;
    }

    /**
     * @param mixed $idCommerce
     */
    public function setIdCommerce($idCommerce)
    {
        $this->idCommerce = $idCommerce;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->Ville;
    }

    /**
     * @param mixed $Ville
     */
    public function setVille($Ville)
    {
        $this->Ville = $Ville;
    }


    public function __construct($address, $cp, $id_commerce, $ville)
    {
        Adresses::setAdresse($address);
        Adresses::setCodePostal($cp);
        Adresses::setIdCommerce($id_commerce);
        Adresses::setVille($ville);
    }

    public function insert()
    {
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
        $req = $db->prepare("INSERT INTO adresse (Adresse,Ville,CodePostal,id_commerce)" . "VALUES (:Adresse,:Ville,:cp,:id_commerce)");
        $adresse = Adresses::getAdresse();
        $Ville = Adresses::getVille();
        $cp = Adresses::getCodePostal();
        $id_commerce = Adresses::getIdCommerce();

        $req->bindParam(":Adresse", $adresse);
        $req->bindParam(":Ville", $Ville);
        $req->bindParam(":cp", $cp);
        $req->bindParam(":id_commerce", $id_commerce);
        $req->execute();
        $this->id = $db->lastInsertId();
        $db = null;
    }

    public function modify()
    {
        $db = new PDO("mysql:host=" . config::$SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
        $req = $db->prepare("UPDATE adresse SET Adresse=:adresse ,Ville=:Ville, CodePostal=:cp WHERE id=:id");
        $Address = Adresses::getAdresse();
        $Ville = Adresses::getVille();
        $cp = Adresses::getCodePostal();
        $id_commerce = Adresses::getIdCommerce();
        $id = Adresses::getId();
        $req->bindParam(":id", $id);
        $req->bindParam(":adresse", $Address);
        $req->bindParam(":Ville", $Ville);
        $req->bindParam(":cp", $cp);
        $req->bindParam(":id_commerce", $id_commerce);
        $req->execute();
        $db = null;
    }

    public function delete()
    {
        $db = new PDO("mysql:host=" . config::$SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
        $req = $db->prepare("DELETE * FROM Adresse WHERE id=:id");
        $id = getId();
        $req->bindParam(":id", $id);
        $req->execute();
        $db = null;
    }

    public static function getAdresseById($id)
    {
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
        $req = $db->prepare("SELECT * FROM Adresse WHERE id=:id");
        $req->bindParam(":id", $id);
        $req->execute();
        $result = $req->fetchAll();
        $address = $result[0]["Adresse"];
        $Ville = $result[0]["Ville"];
        $cp = $result [0]["CodePostal"];
        $id_commerce = $result[0]["id_commerce"];

        $Adresse = new Adresses($address, $cp, $id_commerce, $Ville);
        $Adresse->setId($id);
        $db = null;

        return $Adresse;
    }

    public static function getAdressesByIdCommerce($id_commerce)
    {
        $db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
        $req = $db->prepare("SELECT * FROM Adresse WHERE id_commerce=:id_commerce");
        $req->bindParam(":id_commerce", $id_commerce);
        $req->execute();
        $result = $req->fetchAll();
        $Adresses = [];
        foreach ($result as $line) {
            $Adresses[] = Adresses::getAdresseById($line["id"]);
        }
        $db = null;
        return $Adresses;
    }
}