<h1>Liste des films</h1>

<?php
    foreach ($movies as $movie) {
        echo $movie->title . '<br />';
        $releasedAt = date_create($movie->released_at);
        echo date_format($releasedAt, 'd m Y') . '<br />';
        echo $movie->synopsis . '<br />';
        echo "<a href='/movies/" . $movie->id . "'><img src='$movie->film_poster' alt='' /></a>";
        echo "<hr />";
    }
?>