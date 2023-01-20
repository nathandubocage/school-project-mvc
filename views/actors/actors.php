<h1>Liste des acteurs avec les films</h1>
<?php
echo "<a href=''>Ajouter un acteur</a>";
foreach ($actorsAll as $name => $actors) {
    echo "<pre>";
    print_r($actorsAll);
    echo "</pre>";

    echo "<h2>{$name}</h2>";
    foreach ($actors as $actor) {
        echo "{$actor['title']} - ";
        echo "{$actor['character']}";
        echo "<hr />";
    }
}
?>