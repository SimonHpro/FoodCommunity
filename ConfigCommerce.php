
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" type="image/x-icon" href="Classes/favicon.png"/>
</head>
<body>
<?php
include_once 'Classes/config.php';
include_once'Classes/Adresses.php';
$id_commerce= 1;
$Adresses = Adresses::getAdressesByIdCommerce($id_commerce);
?>
<div>
    <div>
    <h3>Adresses disponibles : </h3>
    </div>
    <table>
    <tr>
        <th>Adresse</th>
        <th>Code Postal</th>
        <th>Ville</th>

    </tr>
    <?php foreach($Adresses as $address){ ?>
        <tr>
            <td><?php echo $address->getAdresse() ?></td>
            <td><?php echo $address->getCodePostal() ?></td>
            <td><?php echo $address->getVille() ?></td>
          </tr>
        <?php }?>
    </table>
    <button >Ajouter une adresse</button>
    <div class="formAdress">

    </div>
</div>
</body>
</html>
