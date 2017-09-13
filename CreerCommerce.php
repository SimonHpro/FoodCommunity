<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head lang="fr">
    <title>Food Community</title>
    <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Text" rel="stylesheet">
</head>
<style> .input{
        margin:0px;
        border-radius:4px;
    }
.input input{
    border-radius
}</style>

<h2 id="mainTitle">Food Community</h2>
<div id="formulaire">
<form class="form-control" action="Classes/insertCommerce.php" method="post" autocomplete="off">
        <span class="input">
            <label for="nom"><b>Nom du commerce</b></label>
            <br>
            <input class="form-control" type="text" name="nom" id="nom" maxlength="30" required style="text-transform: capitalize;"/>
        </span>
    <br>

    <span class="input">
        <label for="mail"><b>Mail : </b></label>
        <br>
        <input class="form-control" type="email" name="mail" id="mail" autocomplete="off" required/>
    </span>
    <br>

    <span class="input">
        <label for="password"><b>Mot de passe : </b></label>
        <br>
        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required/>

    </span>

    <br>
    <span class="input">
        <label for="tel"><b>Numéro de téléphone :</b></label>
        <br>
        <input class="form-control" type="number" name="tel" id="tel" max="9999999999"  minlength="10" min="0000000000" maxlength="10" autocomplete="off" required/>
    </span>
    <br>

    <span class="input">
        <label for="address"><b>Adresse :</b></label>
        <br>
        <input class="form-control" type="text" name="address" id="address" autocomplete="off" required/>
    </span>
    <br>
    <span class="input">
        <label for="CP"><b> Code postal :</b></label>
        <br>
        <input class="form-control" type="number" name="CP" id="CP" maxlength="5" min="00001" max="99999" autocomplete="off" required/>
    </span>
    <br>

    <span class="input">
        <label for="ville"><b>Ville : </b></label>
        <br>
        <input class="form-control" type="text" name="ville" id="ville" autocomplete="off" required/>
    </span>
    <br>
    <br>

    <div>
        <button type="submit" id="add" class="btn btn-success">Compléter l'inscription</button>

    </div>
</form>
</div>

</body>
</html>
