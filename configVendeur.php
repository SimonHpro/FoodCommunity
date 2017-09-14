<?php session_start(); ?>
<!doctype html>

<html>
<head>
    <title>Food Community</title>
    <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
    <script>
        function modiTel() {
            var x = document.getElementById('telmodi');
            var y = document.getElementById('btnmodi');
            if (x.style.display === 'none') {
                x.style.display = 'block';
                y.style.display = 'none';
            } else {
                x.style.display = 'none';
                y.style.display = 'block';
            }
        }
    </script>

</head>

<body>
<?php
include_once "Classes/config.php";
include_once "Classes/Commerce.php";
include_once "Classes/Adresses.php";

$id_commerce = $_SESSION["UserId"];
$commerce = Commerce::getCommerceById($id_commerce);
$Adresse = Adresses::getAdresseByIdCommerce($id_commerce);
?>
<h1 id="mainTitle">Food Community</h1>
<?php include_once "menu.php"; ?>
<div id="formulaire">
    <h3>Configuration des informations</h3>
    <p>Nom de l'entreprise : <?php echo $commerce->getNom() ?> </p>
    <div>
        <p>Numéro de téléphone : <?php echo "0" . $commerce->getTelephone() ?> </p>
        <input type="button" class="btn btn-info " id="btnmodi" value="modifier" onclick="modiTel()">

        <div id="telmodi" style="height:auto;width:100%;display:none;">
            <form method="post" action="Classes/modifyCommerce.php">
                    <span class="input">
        <br>
        <input class="form-control" type="number" name="tel" id="tel" max="9999999999" minlength="10" min="0000000000"
               maxlength="10" autocomplete="off"  size="10" required/>
    </span>
                <br>
                <button type="submit" id="add" class="btn btn-success" onclick="modiTel()">Modifier le numéro</button>
                <button type="button" id="add" class="btn btn-secondary " onclick="modiTel()">Annuler</button>
            </form>

        </div>
    </div>
    <hr>
    <div style="position:relative;">
        <p>Adresse
            : <?php echo $Adresse->getAdresse() . " " . $Adresse->getCodePostal() . " " . $Adresse->getVille() ?> </p>
        <input type="button" class="btn btn-info" value="modifier">

        <br>
        <p>Plan google Map de l'adresse <b>(en cours de développement)</b></p>

        
        
        <div id="map" style="width:400px;height:400px;background:yellow; border-radius:15px;"></div>


        <script type="application/javascript">
            
            function myMap() {

            var x = 47.216671;
            var y = -1.55;
                
                var mapOptions =
                    {
                        center: new google.maps.LatLng(x, y),
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);

                var nantes = {lat: x, lng: y};
                var marker = new google.maps.Marker({
                    position: nantes,
                    map: map
                });
            }

        </script>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCswaBP-4k0245Hu91BkKZnKPjhIwgF19c&callback=myMap">
        </script>
    </div>

    <hr>
    <h3>Historique des ventes</h3>
    <hr>
    <p><b>Historique des produits (en ligne)</b> </p>

    <?php
    
        try 
        {
            $bdd = new PDO('mysql:host='.config::SERVERNAME.";dbname=".config::DBNAME,config::USER, config::PASSWORD);
        }
        catch(Execption $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    
        
        $rep = $bdd->query("SELECT * FROM produit WHERE id_commerce=".$_SESSION['UserId']);
        while($data = $rep->fetch())
        {
            echo "<button style=\"float:right\" class=\"btn btn-danger\">X</button>";
                echo "<img class=\"icone\" src=\"ProductImages/";
                echo $data['images'];
                echo "\"/>";
                echo "Nom du produit : " . $data['names']."<br>";
                echo "Description du produit : " . $data['desc']."<br>";
                echo "DLC : " . date("d/m/y" ,strtotime($data['DLC'])) . "<br>";
                echo "Poids : " . $data['poids'] . "kg <br>";
                
                echo "<p>Prix : ". $data['prix'] ."€";
                
                echo "<hr>";
        }
    ?>
</div>
</body>
</html>