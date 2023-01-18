<h1>Single</h1>

<?php
    echo $movie->title . '<br />';
    echo $movie->summary . '<br />';
    echo "<img src='$movie->banner' alt='' /><br />";
    echo $movie->trailer . "<br />";

    $date = IntlCalendar::fromDateTime($movie->released_at, "fr_FR"); 
    echo IntlDateFormatter::formatObject($date, IntlDateFormatter::TRADITIONAL); 
?>

<h2>Galerie d'image</h2>

<?php
    echo "<pre>";
    print_r($gallery);
    echo "</pre>";
?>

<h2>Espace commentaire</h2>

<h3>Formulaire</h3>
<form action="../comments/add" method="post">
    <textarea name="message"></textarea>
    <input type="submit" value="Envoyer" />
</form>

<h3>Liste des commentaires</h3>
<?php
    echo "<pre>";
    print_r($comments);
    echo "</pre>";
?>

<h2>Liste des acteurs</h2>
<?php
    echo "<pre>";
    print_r($actors);
    echo "</pre>";
?>

<hr />
