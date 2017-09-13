<meta charset="UTF-8">
<?php

include_once "Commerce.php";
include_once "config.php";
include_once "Adresses.php";
$nom = $_POST["nom"];
$Mail = $_POST["mail"];
$mdp = $_POST["password"];
$tel = $_POST["tel"];
$Addr = $_POST["address"];
$CP = $_POST["CP"];
$ville =$_POST["ville"];

$Commerce = new Commerce($nom,$Mail,$mdp,$tel);
$Commerce->insert();
$id_commerce = $Commerce->getId();
$Adresse = new Adresses($Addr,$CP,$id_commerce,$ville);
$Adresse->insert();

header("location:../vitrine.php");

die();
