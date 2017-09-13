<!doctype html>

<html>
	<head>
		<title>Page Title</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
	</head>

	<body>
        <?php include_once "menu.php"; ?> 
        <h2 id="mainTitle">Food Community</h2>
        <div id="formulaire">
            <h3>Configuration des informations</h3>
            <p>Nom de l'entreprise : </p>
            <p>Numéro de téléphone : </p>
            <input class="btn btn-info" value="modifier">
            <hr>
            <p>Adresse : </p>
            <input class="btn btn-info" value="modifier">
            
            <br>
            <p>Plan google Map de l'adresse <b>(en cours de développement)</b></p>
            
            <div id="map" style="width:400px;height:400px;background:yellow; border-radius:15px;"></div>
            
            <script>
            function myMap() {
                var mapOptions = 
                    {
                        center: new google.maps.LatLng(47.216671, -1.55),
                        zoom: 10,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                
                var nantes = {lat:47.216671, lng:-1.55};
                var marker = new google.maps.Marker({
                      position: nantes,
                      map: map
                    });
            }
                
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCswaBP-4k0245Hu91BkKZnKPjhIwgF19c&callback=myMap">
    </script>
            
            
            <hr>
            <h3>Historique des ventes</h3>
            <p>Historique des ventes en cours : </p>
            <input class="btn btn-info" value="Afficher mes produits">
            <hr>
            <p>Historique des ventes </p>
            <input class="btn btn-info" value="Voir mes ventes">
        </div>
	</body>
</html>