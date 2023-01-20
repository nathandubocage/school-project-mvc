<h1>Liste des films</h1>

<?php

use utils\SessionHelpers;

    if (SessionHelpers::isAdmin()) {
        echo "<a href='/movies/add'>Ajouter un film</a> <br />";
    }

    foreach ($movies as $movie) {

        echo "<a href='/movies/{$movie->id}/edit'>Éditer</a> <br />"; 
        echo "<a href='/movies/{$movie->id}/delete'>Supprimer</a> <br />"; 

        echo $movie->title . '<br />';
        $releasedAt = date_create($movie->released_at);
        echo date_format($releasedAt, 'd m Y') . '<br />';
        echo $movie->synopsis . '<br />';
        echo "<a href='/movies/" . $movie->id . "'><img src='$movie->film_poster' alt='' /></a>";
        echo "<hr />";
    }
?>