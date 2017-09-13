<?php
session_start();
include_once 'config.php';
$mail = $_POST["username"];
$password = $_POST["password"];

$db = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
$req = $db->prepare("SELECT * FROM commerce WHERE mail=:mail");
$req->bindParam(":mail", $mail);
$req->execute();
$resultat = $req->fetchAll();
$long = sizeof($resultat);
$id_commerce = $resultat[0]["id"];
$_SESSION["UserId"]= $id_commerce;
var_dump($id_commerce);
var_dump($long);
if ($long != 0) {
    $mdp = $resultat[0]["password"];
    if ($mdp === $password) {
       header("location: ../configVendeur.php");

    } else {
        header('location: ../connexion.php?resp=error');
    }
} else {
    header('location: ../connexion.php?resp=error');
}


$db=null;
