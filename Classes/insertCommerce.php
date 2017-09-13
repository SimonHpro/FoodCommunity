<?php
include_once "Commerce.php";
include_once "config.php";
$nom = $_POST["nom"];
$Mail = $_POST["mail"];
$mdp = $_POST["password"];
$tel = $_POST["tel"];

$Commerce = new Commerce($nom,$Mail,$mdp,$tel);
$Commerce->insert();
header("location:../Accueil.php");

die();
