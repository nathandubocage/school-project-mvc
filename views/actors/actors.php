<h1>Liste des acteurs avec les films</h1>
<?php
foreach ($actorsAll as $name => $actors) {
    echo "<h2>{$name}</h2>";
    foreach ($actors as $actor) {
        echo "{$actor['title']} - ";
        echo "{$actor['character']}";
        echo "<hr />";
    }
}
?>