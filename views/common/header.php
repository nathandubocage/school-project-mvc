<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/public/css/main.css" />
        <title>Toy Story - La saga</title>
    </head>
    <body>
        <ul>
            <li><a href="/movies">Liste des films</a></li>
            <li><a href="/gallery">Galerie d'images</a></li>
            <li><a href="/actors">Liste des acteurs</a></li>

            <?php
                if (!isset($_SESSION['username'])) { 
                    echo "<li><a href='/login'>Connexion</a></li><li><a href='/register'>Inscription</a></li>";
                } else {
                    echo "<li><a href='/logout'>Déconnexion</a></li>";
                }
            ?>
        </ul>