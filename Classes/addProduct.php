<?php
session_start();
include_once 'config.php';

 $id_commerce=$_SESSION["UserId"];


$target_dir = "../ProductImages/";
//$target_file = $target_dir . basename($_FILES['icone']['tmpname']);
//$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$tmp_file = $_FILES["fichier"]["name"];

echo $_FILES['fichier']['name'];
try
{
    $bdd = new PDO('mysql:host='.config::SERVERNAME.";dbname=".config::DBNAME,config::USER, config::PASSWORD);
}
catch(Execption $e)
{
    die('Erreur : '.$e->getMessage());
}

/*
echo $_POST['nomProduit'];
echo $_POST['descProduit'];
echo $_POST['prixProduit'];
echo $_FILES["fichier"]["name"];
*/

//echo "id_categorie : " . $_POST["id_categorie"];

$rep = $bdd->query("INSERT INTO `produit`(`names`, `desc`, `prix`, `images`, `DLC`, `poids`, `id_commerce`, `id_categorie`) 
VALUES('" .$_POST['nomProduit']."','".$_POST['descProduit']."' , '".$_POST['prixProduit']."', '".
    $_FILES["fichier"]["name"]."', '". $_POST['DLC'] ."', '". $_POST['poids'] ."', 4, 4)");


//VALUES (NULL, '".$_GET['nomProduit']."','".$_GET['descProduit']."' , '".$_GET['prixProduit']."', '".$_GET['icone']."')");

move_uploaded_file($_FILES['fichier']['tmp_name'], $target_dir . basename($_FILES['fichier']['name']));

header('Location:../vitrine.php');

die();