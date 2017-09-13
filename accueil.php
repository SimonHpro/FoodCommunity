<!doctype html>

<html>
	<head>
		<title>Page Title</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
        <style>
            body img{
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
        <img height="100px" 
             style="position:absolute; float:right; border-radius:50%;" 
             src="Images/logo.jpeg">
        <h1 id="mainTitle">Food Community</h1>
        <?php include_once "menu.php"; ?>
        <div id="formulaire">
            <h3>Bienvenue sur le site de revente de produit BIO Food Community.</h3>
            <br>
            <p>Veuillez renseigner vos identifiants pour pouvoir accéder à la plateforme.</p>
            <form class="form-group">
                <label>Identifiant</label>
                <input class="form-control" type="text" class name="login">
                <br>
                <label>Mot de passe</label>
                <input class="form-control" type="password" name="pwd">
                <br>
                <input value="Connexion" type="submit" class="btn btn-success">
            </form>
            <!-- Login MDP -->
        </div>
        
	</body>
</html>