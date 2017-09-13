<?php
include_once "Commerce.php";
include_once "config.php";
$nom = $_POST["nom"];
$Mail = $_POST["mail"];
$mdp = $_POST["password"];
$tel = $_POST["tel"];

$Commerce = new Commerce($nom,$Mail,$mdp,$tel);
$Commerce->insert();
$id_commerce = $Commerce ->getId();
if($_GET["s"]="a"){


}
elseif ($_GET["s"]="m")
$Adresse = new Adresses($address, $cp , $id_commerce);

var_dump($Commerce);

//header("location:../Accueil.php ")
die();
