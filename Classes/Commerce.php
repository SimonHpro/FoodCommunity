<?php

class Commerce
{
    private $id;
    private $Nom;
    private $Mail;
    private $password;
    private $Telephone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->Mail;
    }

    /**
     * @param mixed $Mail
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }

    /**
     * @param mixed $Telephone
     */
    public function setTelephone($Telephone)
    {
        $this->Telephone = $Telephone;
    }

    public function __construct($Nom,$Mail,$password,$telephone){
        Commerce::setNom($Nom);
        Commerce::setMail($Mail);
        Commerce::setPassword($password);
        Commerce::setTelephone($telephone);

}

   public function insert(){
       $db= new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
       $req = $db->prepare("INSERT INTO commerce (Nom,Mail,password,Telephone)" . "VALUES (:Nom,:Mail,:password,:telephone)");
       $Nom= Commerce::getNom();
       $Mail= Commerce::getMail();
       $password = Commerce::getPassword();
       $telephone= Commerce::getTelephone();

       $req->bindParam(":Nom", $Nom);
       $req->bindParam(":Mail", $Mail);
       $req->bindParam(":password", $password);
       $req->bindParam(":telephone",$telephone);
       $req->execute();
       $this->id = $db->lastInsertId();

       $db = null;
   }
   public static function getCommerceById($id){
       $db= new PDO("mysql:host=".config::SERVERNAME.";dbname=".config::DBNAME,config::USER,config::PASSWORD);
       $req = $db->prepare("SELECT * FROM commerce WHERE id=:id");
       $req->bindParam(":id",$id);
       $req->execute();
       $resultat= $req->fetchAll();
       $Nom= $resultat[0]["Nom"];
       $Mail = $resultat[0]["Mail"];
       $password = $resultat[0]["password"];
       $telephone = $resultat[0]["Telephone"];

       $commerce = new Commerce($Nom,$Mail,$password,$telephone);

       $commerce->id = $id;
       $db = null;
       return $commerce;
   }
   public function modify($id){
       $db= new PDO("mysql:host=".config::$SERVERNAME.";dbname=".config::DBNAME, config::USER,config::PASSWORD);
       $req = $db->prepare("UPDATE commerce SET Nom=:Nom ,Mail=:Mail, password=:password , Telephone=:telephone WHERE id=:id");
       $req->bindParam(":id",$id);
       $req->bindParam(":Nom", $Nom);
       $req->bindParam(":Mail", $Mail);
       $req->bindParam(":password", $password);
       $req->bindParam(":telephone",$telephone);
       $req->execute();
       $db= null;
   }
}
