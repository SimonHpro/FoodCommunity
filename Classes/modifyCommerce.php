<?php
session_start();
$id= $_SESSION["UserId"];
include_once "Commerce.php";
include_once "config.php";


if(isset($_POST['tel'])){
    $Commerce= Commerce::GetCommerceById($id);
    $tel= $_POST['tel'];
    $nom = $Commerce->getNom();
    $mail = $Commerce->getMail();
    $mdp = $Commerce->getPassword();
    $com = new Commerce($nom,$mail,$mdp ,$tel);
    $com->setId($id);
    $com->modify();
    header('location : ../configVendeur.php');
    die();
}

/*if(isset($_POST['mdp'])){
    $Commerce= Commerce::GetCommerceById($id);
    $mdp= $_POST['mdp'];
    $nom = $Commerce->getNom();
    $mail = $Commerce->getMail();
    $tel = $Commerce->getTelephone();
    $com = new Commerce($nom,$mail,$mdp ,$tel);
    $com->modify($id);
    header('Location : ../configVendeur.php');
die();
}*/


