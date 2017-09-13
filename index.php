<!doctype html>

<html>
	<head>
		<title>Page Title</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/index.css">
	</head>

	<body>
        <?php include_once "menu.php"; ?> 
        <h1 id="mainTitle">Food Community</h1>
        <div id="formulaire">
            <h2 id="">Ajouter un Produit</h2>
            <form method="post" enctype="multipart/form-data" action="addProduct.php">
                <p>
                    Nom du produit : 
                    <input type="text" name="nomProduit" class="form-control" />
                </p>
                <p>
                    Descriptif du produit : 
                    <input type="text" name="descProduit" class="form-control"/>
                </p>
                <p>
                    Prix du produit (€): 
                    <input type="number" name="prixProduit" class="form-control" step="0.01"/>
                </p>
                <p>
                    Image du produit :
                    <input class="btn" type="file" name="fichier" id="icone"/>
                </p>
                <p>
                    Poids du produit :
                    <input name="poids" type="number" class="form-control" step="0.01">
                </p>
                <p>
                    Catégorie du produit :
                <select name="id_categorie">
                    <?php 
                    
                    try 
                    {
                        $bdd = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'root', '');
                    }
                    catch(Execption $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
                    $rep = $bdd->query('SELECT * FROM categorie');
                    
                    while ($data = $rep->fetch())
                    {
                        echo "<option value='".$data['id']."'>" . $data['nomCategories'] ."</option>";
                    }
                    
                    ?>
                </select>                
                </p>
                <p>
                    DLC (date limite de consommation) : 
                    <input name="DLC" class="form-control" data-format="YYYY/MM/DD" type="date">
                </p>
                <input type="submit" name="submit" value="Envoyer"class="btn btn-success">
            </form>
        </div>
	</body>
</html>