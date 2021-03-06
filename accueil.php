<!DOCTYPE html>
<html>
	<head>
        <title>Food Community</title>
        <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

        <style type="text/css">
    body{
    background-image: url(Images/l%C3%A9gumes.jpg);
            }
            #formulaire{
                background-image: url("Images/wood2.jpg");
                text-align: center;
                font-family: 'Indie Flower', cursive;
                font-size: 200%;
                color: white;
                opacity: 0.8;
                border: 3px solid white;
            }

            #titleTwo{
                font-size: 250%;
                color: lightgreen;
                border-bottom: 3px solid lightgreen;
            }
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
        <h1 id="mainTitle">Food Community</h1>
        <?php include_once "menu.php"; ?>
        <div id="formulaire">
            <h1 id="titleTwo"><b>Notre action</b></h1>
            <br>
            <b>
            <p>Food Community rassemble les personnes désirant lutter contre le gaspillage.</p>
            <p>Grâce à un accord avec les entreprises nous vous proposons des produits qui sont consommable mais se rapprochant de la fin de la date limite de consommation.</p>
            <p>Les entreprises partenaires ont choisi Food Community pour vous offrir des prix bas sur ces produits</p>
            <p>L'avantage de nos services permet de réduire les gachis de nourritures mais aussi les pertes dans les entreprises d'alimentation.</p>
            <br>
            <p>Trailer de l'application :</p>
            <video width="520" height="420" controls autoplay>
                <source src="Images/TrailerFC.avi" type="video/avi">
                <source src="Images/TrailerFC.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p>Arrêtez de gaspiller rejoignez Food Community !!!</p>
                </b>
        </div>
	</body>
</html>