<?php session_start(); ?>
<!doctype html>

<html>
	<head>
        <title>Food Community</title>
        <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png"/>
		<meta charset="UTF-8">
        <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png" />
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <style>
            .stop{
                animation: example 2s infinite;
            }
            @keyframes example {
                0%{transform: rotate(0deg);}
                33%{transform: rotate(10deg);}
                66%{transform: rotate(-10deg);}
                100%{transform: rotate(0deg);}
            }
        </style>
	</head>

	<body>
    <img class="stop" height="100px"
         style="position:absolute; float:right; border-radius:50%;"
         src="Images/logo.jpeg">

        <?php include_once "Classes/config.php";
        if(isset($_SESSION["UserId"])) {
            ?><h1 id="mainTitle">Food Community</h1>
            <?php
            include_once "menu.php";

        }else{
            ?>
    <div style="height:30px;width:100%;">
        <a href="connexion.php"><button  class="btn btn-info" style="float:right;">Connexion entreprise</button></a>
        <a href="CreerCommerce.php"><button  class="btn btn-info" style="float:right;">Inscription entreprise</button></a>

    </div>
            <h1 id="mainTitle">Food Community</h1>
        <?php }

        $MAX_CATEGORIE = 5;
        ?>

        <div id="formulaire">
            <h2>Description des produits disponibles</h2>
            <br>

        <?php
        try 
        {
            $bdd = new PDO('mysql:host='.config::SERVERNAME.";dbname=".config::DBNAME,config::USER, config::PASSWORD);
        }
        catch(Execption $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        
        $rep = $bdd->query('SELECT * FROM produit');
            
        $repCategorie = $bdd->query('SELECT * FROM categorie');
        
            $tabCategorie = array();
        $index = 1;
        while ($dataCategorie = $repCategorie->fetch())
        {
            $tabCategorie[$index] = $dataCategorie['nomCategorie'];
            $index++;
        }
        /*   
        for ($i = 1; $i < 4; $i++){
            echo $tabCategorie[$i] . '<br>';
        }
        */  
        ?>
            <form action="" form="get">
                <p>Recherche par catégorie<br>
                    <select name="categorie">
                        <option value="0">Tous</option>
                        <?php
                            for ($i = 1; $i <= $MAX_CATEGORIE; $i++)
                            {
                                echo '<option value="'.$i.'">' . $tabCategorie[$i] . '</option><br>';
                            }
                        ?>
                    </select>
                    <input class="btn btn-success" value="Recherche" type="submit">
                </p>
                <hr>
            </form>
        <?php
        while ($data = $rep->fetch())
        {
            if (isset($_GET['categorie']) && $data['id_categorie'] == $_GET['categorie'])
            {
                echo "<img class=\"icone\" src=\"ProductImages/";
                echo $data['images'];
                echo "\"/>";
                echo "Nom du produit : " . $data['names']."<br>";
                echo "Description du produit : " . $data['desc']."<br>";
                echo "DLC : " . date("d/m/y" ,strtotime($data['DLC'])) . "<br>";
                echo "Poids : " . $data['poids'] . "kg <br>";
                echo "Categorie : " . $tabCategorie[$data['id_categorie']] . "<br><br>";
                echo "<input class=\"btn btn-success\" value=\"ACHETER ". $data['prix'] ."€\">";
                echo "<hr>";
            }
            
            if (!isset($_GET['categorie']) || $_GET['categorie'] == 0)
            {
                
                echo "<img class=\"icone\" src=\"ProductImages/";
                echo $data['images'];
                echo "\"/>";
                echo "Nom du produit : " . $data['names']."<br>";
                echo "Description du produit : " . $data['desc']."<br>";
                echo "DLC : " . date("d/m/y" ,strtotime($data['DLC'])) . "<br>";
                echo "Poids : " . $data['poids'] . "kg <br>";
                echo "Categorie : " . $tabCategorie[$data['id_categorie']] . "<br><br>";
                echo "<input class=\"btn btn-success\" value=\"ACHETER ". $data['prix'] ."€\">";
                echo "<hr>";    
            }
            
        }
        
        ?>
        </div>
	</body>
</html>