<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/public/css/main.css" />
    <link rel="shortcut icon" href="http://<?= $_SERVER['HTTP_HOST']; ?>/public/images/favicon.ico" type="image/x-icon" />
    <title>Toy Story - La saga</title>
</head>

<body>
    <header class="header">
        <div class="container-medium">
            <nav class="header__nav">
            <ul class="header__list">
                <li class="header__item"><a href="/">· Accueil</a></li>
                <li class="header__item"><a href="/movies/">· Liste des films</a></li>
                <li class="header__item"><a href="/actors/">· Le casting</a></li>
                <li class="header__item"><a href="/gallery/">· Galerie d'images</a></li>
            </ul>
            <ul class="header__list">
                <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='header__item'><a href='/login'>Me connecter</a></li><li><a href='/register'>S'inscrire</a></li>";
                    } else {
                        echo "<li class='header__item'><a href='/logout'>Me déconnecter</a></li>";
                    }
                ?>
            </ul>
            </nav>
        </div>
    </header>