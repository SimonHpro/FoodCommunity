<!doctype html>

<html>
<head>
    <title>Food Community</title>
    <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
    <style>
        body img {
            animation: example 2s infinite;
        }

        @keyframes example {
            0% {
                transform: rotate(0deg);
            }
            33% {
                transform: rotate(10deg);
            }
            66% {
                transform: rotate(-10deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }
    </style>
</head>
<body>
<img height="100px"
     style="position:absolute; float:right; border-radius:50%;"
     src="Images/logo.jpeg">
<h1 id="mainTitle">Food Community</h1>
<div id="formulaire">
    <h3>Bienvenue sur le site de revente de produit BIO Food Community.</h3>
    <br>
    <p>Veuillez renseigner vos identifiants pour pouvoir accéder à la plateforme.</p>
    <?php include_once 'Classes/config.php';
    if (isset($_GET['resp'])) {
        $resp = $_GET["resp"];
        if ($resp == "error") {
            echo "<b style='color:red;'>Mot de passe ou mail incorrect</b>";

        }
        if ($resp == "deco") {
            echo "<b style='color:red;'>Vous avez été déconnecté</b>";
        }
    }
    ?>
    <div class="container">
        <form autocomplete="off" method="post" action="Classes/CheckConnect.php">
                    <span class="input">
                        <label for="username">Email de l'utilisateur</label>
                        <input class="form-control" type="text" name="username" required>
                    </span>
            <span class="input">
                        <label for="password"> Mot de passe</label>
                        <input class="form-control" type="password" name="password" required>
                    </span>
            <br>
            <input value="Connexion" type="submit" class="btn btn-success">
            <?php
            $url = $_SERVER['HTTP_REFERER'];
            $host = $_SERVER['HTTP_HOST'];


            if ($url != $host . "/FoodCommunity/vitrine.php" && $url != $host . "/FoodCommunity/index.php") {
                    ?>
                    <a href="index.php">
                        <button type="button" id="add" class="btn btn-secondary ">Retour</button>
                    </a>
                    <?php
            } elseif ($url != $host . "/FoodCommunity/index.php") {
                ?><a href="vitrine.php">
                    <button type="button" id="add" class="btn btn-secondary ">Retour</button>
                </a>
                <?php
            } elseif ($url != $host . "/FoodCommunity/vitrine.php") {
                ?>
                <a href="index.php">
                    <button type="button" id="add" class="btn btn-secondary ">Retour</button>
                </a>
                <?php
            }?>


        </form>
    </div>
</div>

</body>
</html>