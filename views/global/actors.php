<h1>Gallery</h1>
<?php
    foreach ($actorsAll as $title => $actors) { 
        echo "<h2>{$title}</h2>";
        foreach ($actors as $actor) {
            echo "{$actor['character']}";
            echo "<hr />";
        }
    }
?>