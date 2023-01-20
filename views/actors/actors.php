<h1>Liste des acteurs avec les films</h1>
<?php
echo "<a href='/actors/add'>Ajouter un acteur</a>";
foreach ($actorsAll as $name => $actors) {
    echo "<h2>{$name}</h2>";
    foreach ($actors as $index => $actor) {
        echo "{$actor['title']} - ";
        echo "{$actor['character']}";
        if ($index == 0) {
            echo "<a href='/actors/{$actor['actor_id']}/edit'>Modifier cet acteur</a> ";
            echo "<a href='/actors/{$actor['actor_id']}/delete'>Supprimer cet acteur</a>";
        }
        echo "<hr />";
    }
}
?>