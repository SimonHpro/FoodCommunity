<!doctype html>

<html>
	<head>
		<title>Page Title</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
	</head>

	<body>
        <?php 
        include_once "menu.php"; 
        $MAX_CATEGORIE = 5;
        ?>
        <h1 id="mainTitle">Food Community</h1>
        <div id="formulaire">
            <h2>Description des produits disponibles</h2>
            <br>
        <?php
        try 
        {
            $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '');
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
            $tabCategorie[$index] = $dataCategorie['nomCategories'];
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